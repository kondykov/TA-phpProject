<script setup>
import ContactComponent from './chat/ChatContactComponent.vue';
import MessageComponent from "./chat/message/MessageComponent.vue";
import { stringify } from 'flatted';

import Spinner from "./Spinner.vue";
import { DOT_NET_SERVICE_URL } from './../config';
import {onMounted, ref, nextTick, onUpdated} from "vue";

const props = defineProps([
    'user',
    'token'
])


const messageInput = ref("")
const messages = ref([]);
const messagesField = ref(null);
const chatFetching = ref(false)
const loading = ref(false)
const chats = ref(null)
const avatars = ref(null)
const error = ref(null)
const chatId = ref(1)
const messageSent = ref(false)
const sending = ref(false)

let receivedMessage;



const wsConnected = ref(false)
let socket = new WebSocket("ws://" + DOT_NET_SERVICE_URL + '/ws/connect?token=' + props.token)


socket.onopen = function(e) {
    wsConnected.value = true
};

socket.onmessage = function(event) {
    Receive(event)
};

socket.onclose = function(event) {
    if (event.wasClean) {
        alert(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
    } else {
        alert('[close] Соединение прервано');
    }
    wsConnected.value = false
};

socket.onerror = function(error) {
    alert(`[error]`);
};

onMounted(() => {
    getChatMessages()
    fetchChats()
})

onUpdated(()=>{
    scrollToBottom()
})

async function WebsocketSend(payload) {
    if (wsConnected) {
        console.log(payload)
        socket.send(JSON.stringify(payload))
        return true
    }
    return false
}

async function Receive(event) {
    let innerJsonString = JSON.parse(event.data)
    let json = JSON.parse(innerJsonString);
    console.log(json)
    if (json.hasOwnProperty('success')){
        if (json.success === true) {
            messageInput.value = ""
        }
        sending.value = false
    }
    if (json.hasOwnProperty('chat_id') && json.hasOwnProperty('sender') && json.hasOwnProperty('content')) {
        await WriteMessage(json)
    }
}

async function WriteMessage(data) {
    if (chatId.value === data.chat_id) {
        let receivedMessage = {
            type: false,
            content: data.content
        }
        if (props.user === data.sender) {
            receivedMessage.type = 'sent'
        } else {
            receivedMessage.type = 'received'
        }
        messages.value.push({
            type: receivedMessage.type,
            content: receivedMessage.content
        })
    }
}

async function getChatMessages() {
    loading.value = true;
    const config = {
        headers: {
            Authorization: `Bearer ${props.token}`,
        },
    };
    try {
        const response = await axios.get(`api/chat/get-all-messages?chat_id=${chatId.value}`, config);
        let data = response.data
        console.log(data.data)
        data.data.forEach((data) => {
            WriteMessage({
                content: data.content,
                sender: data.user_id,
                chat_id: data.chat_id,
            })
        })
        console.log("346")
    } catch (error) {
        console.error('Ошибка при получении данных:', error);
        error.value = error;
    } finally {
        loading.value = false;
        await scrollToBottom()
    }
}

async function fetchChats() {
    chatFetching.value = true;
    try {
        const response = await axios.get(`api/chat/get-all`, {
            headers: {
                Authorization: `Bearer ${props.token}`
            }
        });
        avatars.value = response.data.fakeImages;
        chats.value = response.data.data;
        chatId.value = chats.value[0]
    } catch (error) {
        console.error('Ошибка при получении данных:', error);
        error.value = error;
    } finally {
        chatFetching.value = false;
    }
}

async function send() {
    if (messageInput.value.trim() === '') return;
    sending.value = true
    let payload = {
        process_type: 3,
        data: {
            chat_id: chatId.value,
            content: messageInput.value
        }
    }
    await WebsocketSend(payload)
}

async function scrollToBottom() {
    const container = messagesField.value;
    if (container) {
        container.scrollTop = container.scrollHeight;
    }
}

async function selectChat(id) {
    chatId.value = id
    messages.value = []
    let response = await getChatMessages()
}
</script>

<template>
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <div class="section my-5">
            <div class="container">
                <h2>Chat</h2>
                <button @click="fetchChats">Update</button>
                <div class="row flex-row">
                    <div class="col-lg-4">
                        <div class="card max-height-vh-70 overflow-auto overflow-x-hidden mb-5 mb-lg-0">
                            <form class="card-header">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Search contact</label>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                            <div class="container d-flex justify-content-center p-3" v-if="chatFetching">
                                <Spinner/>
                            </div>
                            <div v-if="error">{{ error.message }}</div>
                            <div v-if="chats">
                                <div class="card-body p-2">
                                    <div v-for="chat in chats">
                                        <ContactComponent
                                            :name="chat.created_by === user ? chat.companion_name: chat.creator_name"
                                            :avatar="avatars"
                                            :last_message="chat.id"
                                            :is-active="chatId === chat.id"
                                            @click="selectChat(chat.id)"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card max-height-vh-70">
                            <div class="card-header p-0 position-relative mt-2 mx-2 z-index-2 bg-transparent">
                                <div class="bg-dark shadow-dark border-radius-md p-3">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="d-flex align-items-center">
                                                <img alt="Image" src="#" class="avatar">
                                                <div class="ms-3">
                                                    <h6 class="mb-0 d-block text-white">Charlie Watson</h6>
                                                    <span
                                                        class="text-sm text-white opacity-8">last seen today at 1:53am</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 my-auto">
                                            <button class="btn btn-icon-only text-white mb-0 me-3 me-sm-0" type="button"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-original-title="Video call">
                                                <i class="material-symbols-rounded">videocam</i>
                                            </button>
                                        </div>
                                        <div class="col-1 my-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-icon-only text-white mb-0" type="button"
                                                        data-bs-toggle="dropdown">
                                                    <i class="material-symbols-rounded">settings</i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end me-sm-n2 p-2"
                                                    aria-labelledby="chatmsg">
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Profile
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Mute conversation
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Block
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Clear chat
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md text-danger"
                                                           href="javascript:;">
                                                            Delete chat
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body overflow-auto overflow-x-hidden" ref="messagesField">
                                <div v-for="msg in messages" :key="msg.timestamp">
                                    <message-component
                                        :type="msg.type"
                                        :message="msg.content"
                                    />
                                </div>
                            </div>
                            <div class="card-footer d-block">
                                <div class="align-items-center">
                                    <div class="input-group input-group-outline d-flex">
                                        <label class="form-label">Type your message</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-lg"
                                            v-model="messageInput"
                                            :disabled="wsConnected === false"
                                        >
                                        <button
                                            class="btn bg-gradient-dark mb-0"
                                            @click="send"
                                            :disabled="wsConnected === false || messageSent"

                                        >
                                            <i class="material-symbols-rounded">send</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
