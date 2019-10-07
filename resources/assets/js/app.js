
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('proyectos-asignados', require('./components/ProyectosAsignados.vue'));
Vue.component('proyectos-propios', require('./components/ProyectosPropios.vue'));
Vue.component('vista-proyecto', require('./components/VistaProyecto.vue'));
Vue.component('error-404', require('./components/Error404-b.vue'));
Vue.component('lista-actividades',require('./components/ListaActividades.vue'));
Vue.component('actividad',require('./components/Actividad.vue'));
Vue.component('datos-proyecto',require("./components/DatosProyecto.vue"));

const app = new Vue({
    el: '#app',
    data :{
        menu : 0
    }
});
