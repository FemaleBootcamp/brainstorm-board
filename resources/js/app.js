
import './bootstrap';
import 'bootstrap-vue/dist/bootstrap-vue.css'


Vue.component('bb-modal', require('./components/BBModal.vue').default);
Vue.component('bb-data-table', require('./components/BBDataTable.vue').default);

const app = new Vue({
    el: '#app',

    data: {
    	showModal: false
    }
});
