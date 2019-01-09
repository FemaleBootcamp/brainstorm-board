import Vue from 'vue';

import axios from 'axios';

import BootstrapVue from 'bootstrap-vue';

import VueSweetalert2 from 'vue-sweetalert2';

const options = {
    confirmButtonColor: '#ff4d96',
    cancelButtonColor: '#22d1b8'
}

Vue.use(VueSweetalert2, options);

window.Vue = Vue;

window.axios = axios;

Vue.use(BootstrapVue);

window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
