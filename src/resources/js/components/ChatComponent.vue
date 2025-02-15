<script setup>
import ContactComponent from './chat/ChatContactComponent.vue';
import MessageComponent from "./chat/message/MessageComponent.vue";

import {onMounted, ref} from "vue";

const messageInput = ref("")
const messages = ref([]);
const messagesField = ref(null);

const loading = ref(false)
const chatUsers = ref(null)
const avatars = ref(null)
const error = ref(null)
const chatId = ref(null)

const selectedChat = ref(null)

onMounted(() => {
    fetchUsers()
})

setTimeout(() => {
    window.Echo.channel(`message.sent.${chatId}`).listen('', (e) => {
        console.log(e + ' chat id ' + chatId)
    })
})

const props = defineProps([
    'user'
])

async function fetchUsers() {
    loading.value = true; // Устанавливаем загрузку в true
    try {
        const response = await axios.get('chat/get-users', {});
        console.log(response.data);
        avatars.value = response.data.fakeImages;
        chatUsers.value = response.data.users;
    } catch (error) {
        console.error('Ошибка при получении данных:', error);
        error.value = error; // Сохраните ошибку, если нужно
    } finally {
        loading.value = false; // Устанавливаем загрузку в false
    }
}

function send() {
    if (messageInput.value.trim() === '') return;
    messages.value.push({type: 'sent', text: messageInput.value});
    messageInput.value = "";
    messagesField.value.scrollTop = messagesField.value.scrollHeight
}
</script>

<template>
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <div class="section my-5">
            <div class="container">
                <h2>Chat</h2>
                <button @click="fetchUsers">Update</button>
                <div class="row flex-row">
                    <div class="col-lg-4">
                        <div class="card max-height-vh-70 overflow-auto overflow-x-hidden mb-5 mb-lg-0">
                            <form class="card-header">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Search contact</label>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                            <div v-if="loading">
                                <div class="container">
                                    Загрузка...
                                </div>
                            </div>
                            <div v-if="error">{{ error.message }}</div>
                            <div v-if="chatUsers">
                                <div class="card-body p-2">
                                    <div v-for="user in chatUsers">
                                        <ContactComponent
                                            :name="user.name"
                                            :avatar="avatars"
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
                                <message-component
                                    :type="'received'"
                                    :message="'sdgsdhsdh'"
                                />
                                <div v-for="msg in messages" :key="msg.timestamp">
                                    <message-component
                                        :type="msg.type"
                                        :message="msg.text"
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
                                        >
                                        <button
                                            class="btn bg-gradient-dark mb-0"
                                            @click="send"
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
