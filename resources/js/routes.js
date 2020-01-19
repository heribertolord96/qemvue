import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
	routes: [
		
		{
			path: '/commerces',
			name: 'commerces',
			component: require('./components/CommercesComponent')
		},
		{
			path: ':slug',
			name: 'commerce',
			component: require('./components/ShowCommerce'),
			props: true
		},
		{
			path: '*',
			component: require('./views/404')
		}
	],
	mode: 'history',
	scrollBehavior() {
		return {x:0, y:0}
	}
})