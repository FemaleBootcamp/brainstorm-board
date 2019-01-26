<template>
    <div>
        <span v-show="saved" class="saved-notice"><i class="fas fa-thumbs-up"></i> saved!</span>
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
    </div>
</template>
<script>
    import _ from 'lodash';

    export default {

        props: ["idea", "boardId", "unique", "ideaTitle", "ideaDescription"],

        data() {
            return {
                title: this.ideaTitle,
                description: this.ideaDescription,
                board_id: this.boardId,
                id: this.unique,
                saved: false
            }
        },

        methods: {
            addIdea: _.debounce(function () {
                axios.post('/boards/' + this.board_id + '/ideas', this.$data)
                    .then((response) => {
                        this.id = response.data.id;
                        Event.$emit('created', this.saved = true);
                    });
            }, 1000),
            updateIdea: _.debounce(function (id) {
                if ((this.title && this.description) && (this.title.length && this.description.length !== 0)) {
                    if (this.id) {
                        id = this.id;
                        axios.patch('/boards/' + this.board_id + '/ideas/' + id, this.$data);
                    } else if (!this.id) {
                        this.addIdea();
                    }
                }
            }, 1500)
        }

    };

</script>
