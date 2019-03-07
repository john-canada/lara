require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('john-component', require('./components/myComponent.vue').default);

const app = new Vue({
    el: '#app',

});