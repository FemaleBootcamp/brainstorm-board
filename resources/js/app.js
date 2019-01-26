import './bootstrap';
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('bb-modal', require('./components/BBModal.vue').default);
Vue.component('bb-data-table', require('./components/BBDataTable.vue').default);
Vue.component('bb-idea', require('./components/BBIdea.vue').default);
Vue.component('bb-ideas-list', require('./components/BBIdeasList.vue').default);
Vue.component('bb-loader', require('./components/BBLoader.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

window.Event = new Vue();

const app = new Vue({
    el: '#app',

    data: {
        showModal: false,
        editBoardModal: false,
        deleteBoardModal: false,
        deleteIdeaModal: false
        
    }

});
