import './assets/main.css'
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'

//Importazioni pagine vueRouter
import Home from  "./views.vue/Home.vue";
import About from  "./views.vue/About.vue";

//Creazione rotte
const routes = [
    {  path: '/', component: Home },
    {  path: '/about', component: About },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})
createApp(App).use(router).mount('#app')
