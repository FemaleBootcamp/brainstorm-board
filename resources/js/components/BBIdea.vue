<template>
    <div class="card sticky-notes mb-5">
        <form method="POST" action="/ideas" @keyup.prevent="addIdea(idea.id)">
            <div class="card-header bg-primary">
                <textarea name="title" cols="30" rows="1" class="bold white" v-model="title" v-text="idea.title"></textarea>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><textarea name="description" cols="30" rows="8" v-model="description"
                        v-text="idea.description"></textarea></li>
            </ul>
        </form>
    </div>
</template>
<script>
    import _ from 'lodash';

    export default {

        props: ["idea"],

        data() {
            return {
                title: '',
                description: ''
            }
        },

        methods: {
            addIdea: _.debounce(function (id) {
                if (this.title.length && this.description.length !== 0) {
                    axios.post('/boards/' + this.idea.board_id + '/ideas', this.$data);
                }
            }, 2000)
        }

    };

</script>
