import './assets/main.css'
import 'bootstrap/dist/css/bootstrap.css'
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'

//Importazioni pagine vueRouter
import Index from  "./views.vue/Index.vue";
import Login from  "./views.vue/Login.vue";
import Register from  "./views.vue/Register.vue";

//Creazione rotte
const routes = [
    {  path: '/', component: Index },
    {  path: '/login', component: Login },
    {  path: '/register', component: Register },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})
createApp(App).use(router).mount('#app')
