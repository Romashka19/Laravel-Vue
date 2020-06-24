import VueRouter from "vue-router";
import AdminLayout from "./layout/AdminLayout"
import Admin from "./views/Admin"

export default new VueRouter({
    routes : [
        {
            path: '/home',
            name: 'home',
            component : Admin,
        }
    ],
    mode: 'history'
})
