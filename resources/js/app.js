
require('./bootstrap');

import Vue from "vue";

import VueSweetalert2 from 'vue-sweetalert2';


Vue.use(VueSweetalert2);



import VueRouter from 'vue-router'
Vue.use(VueRouter);


/*-Vue.use(require('vue-moment'));

import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';


Vue.use(VueToast);*/




import honme from './components/ExampleComponent';
import requisitos from './components/Requisito';
import personas from './components/Persona';
import users from './components/User';
import units from './components/Unit';



const routes = [
    { path: '/home', component: honme },
    { path: '/requisitos', component: requisitos },
    { path: '/personas', component: personas },
    { path: '/users', component: users },
    { path: '/units', component: units }
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


