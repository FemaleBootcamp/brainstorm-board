<template>
    <div>
        <div class="row justify-content-center mb-3">
            <a href="#" class="button-outline green-border idea-btn" @click="createIdea()">New Idea</a>
        </div>
        <div class="row d-flex bg-lightgray p-3 pt-lg-5 mt-4 rounded gray-border justify-content-around">
            <div v-for="idea in ideas" :key="idea.id">
                <bb-idea :idea="idea" :unique="idea.id" :boardId="board.id"></bb-idea>
            </div>
        </div>
    </div>
</template>
<script>
    import BBIdea from '../components/BBIdea';
    export default {

        props: ['board', 'board-ideas'],

        data() {
            return {
                ideas: this.boardIdeas,
                idea: {}
            }
        },

        mounted() {
            Event.$on('update', () => this.updateBoard());
        },

        methods: {
            createIdea() {
                this.ideas.unshift(this.idea);
            },
            updateBoard(val) {
                console.log(val);
                // this.ideas[0] = val;
            }
        }
    }

</script>
