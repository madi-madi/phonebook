
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



let Myheader = require('./components/Myheader.vue');
let Myfooter = require('./components/Myfooter.vue');

let Home = require('./components/Home.vue');
let About = require('./components/About.vue');


const routes = [
  { path: '/home', component: Home },
  { path: '/about', component: About }
]

const router = new VueRouter({
	//mode: 'history',// remove hash from url #
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Myfooter}
  /*  created(){
    

    	console.log('Hello world')
    }*/
});
