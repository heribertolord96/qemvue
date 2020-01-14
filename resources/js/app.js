

require('./bootstrap');

window.Vue = require('vue');


//Vue.component('app', 				require('./components/AppComponent.vue'));
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('commerces', require('./components/CommercesComponent.vue').default);
Vue.component('my_commerces', require('./components/myCommerces.vue').default);
Vue.component('show_commerce', require('./components/ShowCommerce.vue').default);
Vue.component('products', require('./components/ProductsComponent.vue').default);
Vue.component('style1', require('./components/Style1Component.vue').default);

//Vue.component('promociones', require('./components/PromotionsComponent.vue').default);
//Vue.component('eventos', require('./components/EventsComponent.vue').default);

Vue.component('infinite', 	require('vue-infinite-loading'));


const app = new Vue({
    el: '#app',
    data :{
        menu : 0,
        //ruta : 'http://advancedqemv1.test'
       
    },
});
