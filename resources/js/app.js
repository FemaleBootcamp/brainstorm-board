
import './bootstrap';

Vue.component('bb-modal', require('./components/BBModal.vue').default);

const app = new Vue({
    el: '#app',

    data: {
    	showModal: false
    }
});
