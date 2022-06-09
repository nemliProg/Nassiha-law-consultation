import { createApp } from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).use(VueSweetalert2).mount('#app')
