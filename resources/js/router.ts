import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
	routes: [
		
	],
	mode: 'history',
	scrollBehavior() {
		return {x:0, y:0}
	}
})