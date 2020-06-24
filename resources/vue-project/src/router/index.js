import Vue from 'vue'
import VueRouter from 'vue-router'
import OnlineMenu from '../views/OnlineMenu.vue';
import Menu from '../views/Menu.vue';
import Order from '../views/Order.vue';
import Restaurant from '../views/Restaurant.vue';
import Home from '../views/Home.vue';
import Command from '../views/Command.vue';
import RestorantLayout from "@/views/layout/RestorantLayout";
//import AdminLayout from "@/views/layout/AdminLayout";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Home',
        component: RestorantLayout,
        children: [
            { path: '', component: Home }
        ]
    },
    {
        path: '/',
        name: 'OnlineMenu',
        component: RestorantLayout,
        children: [
            { path: 'online', component: OnlineMenu }
        ]
    },
    {
        path: '/',
        name: 'Restaurant',
        component: RestorantLayout,
        children: [
            { path: 'restaurant', component: Restaurant }
        ]
    },
    {
        path: '/',
        name: 'Menu',
        component: RestorantLayout,
        children: [
            { path: 'menu', component: Menu }
        ]
    },
    {
        path: '/',
        name: 'Order',
        component: RestorantLayout,
        children: [
            { path: 'order', component: Order }
        ]
    },
    {
        path: '/',
        name: 'Command',
        component: RestorantLayout,
        children: [
            { path: 'command', component: Command }
        ]
    },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
});

export default router
