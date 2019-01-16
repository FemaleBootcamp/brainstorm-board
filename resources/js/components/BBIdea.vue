<template>
    <div class="card sticky-notes mb-5">
        <form method="POST" action="/ideas" @keyup.prevent="updateIdea(idea.id)">
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

        props: ["idea", "boardId", "unique"],

        data() {
            return {
                title: '',
                description: '',
                board_id: this.boardId,
                id: this.unique
            }
        },

        methods: {
            addIdea: _.debounce(function () {
                axios.post('/boards/' + this.board_id + '/ideas', this.$data)
                    .then((response) => {
                        Event.$emit('update', response.data);
                    });
            }, 300),
            updateIdea: _.debounce(function (id) {
                if (this.title.length && this.description.length !== 0) {
                    if (id) {
                        axios.patch('/boards/' + this.idea.board_id + '/ideas/' + id, this.$data)
                            .then((response) => {
                                console.log(response.data.id);
                            });
                    } else {
                        this.addIdea();
                    }
                }
            }, 2000)
        }

    };
</script>