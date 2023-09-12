import './assets/main.css'
import 'bootstrap/dist/css/bootstrap.css'
import '../scss/boolBnbStyle.scss'
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'

//Importazioni pagine vueRouter
import Index from  "./views.vue/Index.vue";
// import Login from  "./views.vue/Login.vue";
// import Register from  "./views.vue/Register.vue";
import Show from "./views.vue/apartment/Show.vue"
// import Create from "./views.vue/apartment/Create.vue"
// import Edit from "./views.vue/apartment/Edit.vue"
import AdvancedSearch from "./views.vue/AdvancedSearch.vue"

//Creazione rotte
const routes = [
    {  path: '/', component: Index },
    // {  path: '/login', component: Login },
    // {  path: '/register', component: Register },
    {  path: '/show', component: Show },
    // {  path: '/create', component: Create },
    // {  path: '/edit', component: Edit },
    {  path: '/list', component: AdvancedSearch },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})
createApp(App).use(router).mount('#app')
