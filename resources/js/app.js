require('./bootstrap');
import VueAuth from "@websanova/vue-auth";
import VueAuthOptions from "./auth";
//import axios from "axios";
import VueAxios from "vue-axios";
window.Vue = require('vue');


Vue.use(VueAxios, axios);
Vue.use(VueAuth, VueAuthOptions);

//Vue.component('app', 				require('./components/AppComponent.vue'));
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Vue.component('appcommerces', require('./components/AppCommercesComponent.vue').default);
//Vue.component('commercetemplate', require('./layouts/CommerceTemplate.vue').default);
Vue.component('commerces', require('./components/CommercesComponent.vue').default);
Vue.component('my_commerces', require('./components/myCommerces.vue').default);
Vue.component('commerce', require('./views/Commerce.vue').default);//view commerce
Vue.component('products', require('./components/ProductsComponent.vue').default);
//Vue.component('style1', require('./components/Style1Component.vue').default);
Vue.component('departments', require('./components/DepartmentsComponent.vue').default);
Vue.component('home', require('./views/index.vue').default);//vista home

//Vue.component('login', require('./Auth/login.vue').default);
//Vue.component('promociones', require('./components/PromotionsComponent.vue').default);
//Vue.component('eventos', require('./components/EventsComponent.vue').default);
  
Vue.component('infinite', 	require('vue-infinite-loading'));
import router from './routes'

const app = new Vue({
    el: '#app',
    router,
    data :{
        menu : 8,
        
       
    },
});