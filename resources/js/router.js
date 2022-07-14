import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "./pages/Home.vue";
import CarsPage from "./pages/CarsPage.vue";
import NotFoundPage from "./pages/NotFoundPage.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/cars",
            name: "cars",
            component: CarsPage
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFoundPage
        }
    ]
});

export default router;