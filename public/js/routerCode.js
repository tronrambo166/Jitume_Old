//----for Node Js inside app.js

//window.Vue= require('vue')
//import VueRouter form 'vue-router'
//Vue.use(VueRoter)
//import {routes} form './allroutes'
//import dash from './components/dash'--inside allroutes

//Vue.component('expcompss', require('./components/ExampleComponent.vue').default);

//----for Node Js

console.log('hi');
// templates
const dash= {

        template:`
        <div class=" w-50 m-auto card h3 bg-dark text-light"><p> Hello Dash</p> <br>
         </div>

        `

    };

    const products= {

        template:`
        <div class=" w-50 m-auto card h3 bg-dark text-light"><p> Hello Products</p> <br>
        </div>

        `

    };

    const brands= {

        template:`
        <div class=" w-50 m-auto card h3 bg-dark text-light"><p> Hello Brands </p> <br>
        </div>

        `

    };

    const home= {

        template:`
        <div class=" w-50 m-auto card h3 bg-dark text-light"><p> Hello Home</p> <br>
         </div>

        `

    };

// templates


// routes



// routes







const router = new VueRouter({
//routes, mode:'history',
base:"laravel_projects/Vue_eCommerce/public"  
});

//const  app = new Vue({ router }).$mount('.content2');
Vue.component('ExampleComponent',require('/components/ExmapleCopmonent.vue').default);

const app = new Vue({
el:'#content',
//router
//components: {       'expcomp': httpVueLoader('js/components/ExampleComponent.vue'), },       
});


console.log('hi');
