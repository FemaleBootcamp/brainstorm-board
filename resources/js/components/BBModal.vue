<template>
    <transition name="modal-fade">
        <div class="modal is-active" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <slot name="title"></slot>
                        <button type="button" class="close" @click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <slot>
                            <form method="POST" action="/boards" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
                                <div class="form-group">
                                    <label for="title">Board title</label>
                                    <input ref="title" type="boardTitle" class="form-control" id="title" v-model="title"
                                        name="title" aria-describedby="titleHelp">
                                    <span class="help-field" v-if="errors.has('title')" v-text="errors.get('title')"></span>
                                </div>
                                <button class="btn btn-secondary" id="create-board" type="submit" :disabled="errors.any()">Create</button>
                            </form>
                        </slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
    import Board from '../models/Board';
    import Errors from '../models/Errors';

    export default {

        data() {
            return {
                title: '',
                boards: '',
                errors: new Errors()
            }
        },

        methods: {

            close() {
                this.$emit('close');
            },
            onSubmit() {
                axios.post('/boards', this.$data)
                    .then(this.onSuccess)
                    .catch(error => this.errors.record(error.response.data.errors));
            },
            onSuccess(response) {
                this.close();
                Event.$emit('submit');
                this.title = '';
            }
        }

    }

</script>
