import { createApp } from 'vue';

const app = createApp({});
const eventBus = app.config.globalProperties.$eventBus = app;

export default eventBus;