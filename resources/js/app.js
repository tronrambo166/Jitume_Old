require('./bootstrap');
const VueRouter = require('./vue-router');

window.Vue = require('vue').default;
console.log('app js');

//import * as VueRouter from 'vue-router';
Vue.use(VueRouter);

//VUEX
import Vuex from 'vuex'
Vue.use(Vuex);
import storeData from './store/store'
const store = new Vuex.Store(
  storeData
);
//VUEX

// routes
import {routes} from './routes/routes';
// routes
//import { Hooper, Slide } from 'hooper';
//import 'hooper/dist/hooper.css';

const router = new VueRouter({
routes, //mode:'history',
base:"laravel_projects/jitumeLive/public/",
//"https://test.jitume.com/", 
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//const  app = new Vue({ router }).$mount('.admin');
//SWEET alert
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast = Toast;
//SWEET alert


//TOASTR
//import toastr from 'toastr'
//window.toastr = toastr;
//TOASTR

//MOMENT
import moment from 'moment'
Vue.filter('time', (a) => {
  return moment(a,'YYYYMMDD').fromNow();
});
Vue.filter('substr', (a,b) => {
  return a.substr(0,b);
});
//MOMENT

import Form from 'vform'
window.Form = Form;

//import noUiSlider from 'nouislider';
//window.noUiSlider = noUiSlider;

const app = new Vue({
el: '.app',
router, store
//components: {       'expcomp': httpVueLoader('js/components/ExampleComponent.vue'), },       
});

// const app2 = new Vue({
// el: '.admin',
// router, store
// //components: {       'expcomp': httpVueLoader('js/components/ExampleComponent.vue'), },       
// });
