require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import VueForm from './components/vue-todo/VueForm.vue';
import VueTable from './components/vue-todo/VueTable.vue';


Vue.component('vue-form', VueForm);
Vue.component('vue-table', VueTable);


const app = new Vue({
    el: '#app',
});