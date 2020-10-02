window.Vue = require('./vue');

import storeArrendatarios from "./store/arrendtarios"
import storePropietarios from "./store/propietarios"
import storeInmuebles from "./store/inmueble"
import VueLazyLoad from 'vue-lazyload'
import VueGallerySlideshow from 'vue-gallery-slideshow';

import { ValidationProvider } from 'vee-validate';
 
// Register it globally
// main.js or any entry file.
Vue.component('ValidationProvider', ValidationProvider);

// declare module 'vue-gallery-slideshow.js';
// import * as VueGallerySlideshow from '.vue-gallery-slideshow';
// const VueGallerySlideshow = require('vue-gallery-slideshow');


// import LightBox from require('vue-image-lightbox')
Vue.use(VueLazyLoad)

// lightbox component

import router from './router'

import Vue from "vue"
import Vuex from 'vuex'
import Vuetify from 'vuetify'
import axios from 'axios'


Vue.use(Vuex)
Vue.use(Vuetify)
Vue.config.productionTip = false

axios.interceptors.response.use(function (response) {
    console.log(['Testeando...', response]);
    return response;
}, function (error) {
    if (error.response.status == 419 || error.response.status == 401) {
        window.location.href = 'http://inmobiliaria.test/'
    }
});

const store = new Vuex.Store({
    modules: {
        arrendatario: storeArrendatarios,
        propietario: storePropietarios,
        inmueble: storeInmuebles,
    }
})

const vuetify = new Vuetify()

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app-component', require('./components/appComponent.vue').default);
Vue.component('inmueble-show-component', require('./components/Inmueble/showComponent.vue').default);
Vue.component('modal-component', require('./components/ModalComponent.vue').default);
Vue.component('edit-component', require('./components/EditComponent.vue').default);
Vue.component('arrendatario-component', require('./components/Arrendatario/CrudArrendatarioComponent.vue').default);
Vue.component('propietario-component', require('./components/Propietario/CrudPropietarioComponent.vue').default);
Vue.component('inmueble-component', require('./components/Inmueble/CrudInmuebleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#content',
    store,
    vuetify,
    router,
})