import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './components/products/Index.vue'

Vue.use(VueRouter)

const routes = [
    {
        path: '/products/:category',
        component: Index
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router