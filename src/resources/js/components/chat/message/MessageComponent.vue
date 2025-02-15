<script setup>
import MessageBodyComponent from "./MessageBodyComponent.vue";

const props = defineProps([
    'message',
    'type'
])
</script>

<template>
    <div class="row mb-4" :class="{'justify-content-start': type === 'received'}, {'justify-content-end text-right' : type === 'sent'}">
        <div class="col-auto">
            <div class="card"
                 :class="{'bg-gradient-dark border-0 text-white': type === 'sent'}">
                <div class="card-body p-2">
                    <message-body-component
                        :message="message"
                        :type="type"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

