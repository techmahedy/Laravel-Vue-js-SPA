
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

const example = require('./components/ExampleComponent.vue').default;
const tasks = require('./components/TasksComponent.vue').default;

const routes = [
   {
      path: '/example',
      component: example
   },
   {
   	  path: '/',
      component: tasks
   }
];

const router = new VueRouter({
	routes
})

const app = new Vue({
    el: '#app',
    router,
});
