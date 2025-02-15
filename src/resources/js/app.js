import './bootstrap';
import './echo.js'
import './config.js'
import { createApp } from 'vue';

const app = createApp({});

import ChatContactComponent from "./components/chat/ChatContactComponent.vue";
import PromoComponent from "./components/PromoComponent.vue";
import ChatComponent from "./components/ChatComponent.vue";

app.component('contact-component', ChatContactComponent)
app.component('promo-component', PromoComponent)
app.component('chat-component', ChatComponent)

app.mount('#app');


