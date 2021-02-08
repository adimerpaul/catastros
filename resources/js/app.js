
require('./bootstrap');

import Vue from "vue";
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import honme from './components/ExampleComponent';
import requisitos from './components/Requisito';



const routes = [
    { path: '/home', component: honme },
    { path: '/requisitos', component: requisitos }
]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});
const app = new Vue({
    el: '#app',
    router,
    mounted() {
        // You are able to access plugin from everywhere via this.$toastr
        // this.$toastr.defaultPosition = "toast-top-left";
        // Send message to browser screen
        // this.$toastr.s(
        //     "This Message From Toastr Plugin\n You can access this plugin : <font color='yellow'>this.$toastr</font>"
        // );
    }
});


