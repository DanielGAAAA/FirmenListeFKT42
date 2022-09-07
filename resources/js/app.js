import './bootstrap';
import { createApp, VueElement } from "vue";
import app from "./app.vue";
import router from "../../app/vue/router.js";


createApp(app).use(router).mount("#app");