

require('./bootstrap');

window.Vue = require('vue');

Vue.component('commerces', require('./components/CommercesComponent.vue').default);
//Vue.component('app', 				require('./components/AppComponent.vue'));
Vue.component('products', require('./components/ProductsComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('infinite', 	require('vue-infinite-loading'));


const app = new Vue({
    el: '#app',
    data :{
        menu : 0
        //ruta : 'http://localhost/escolarsis3_local/public'
    },
});
