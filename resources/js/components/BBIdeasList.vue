<template>
    <div>
        <div class="row justify-content-center mb-3">
            <a href="#" class="button-outline green-border idea-btn" @click="createIdea()">New Idea</a>
        </div>
        <!-- Delete Modal Start -->
        <bb-modal v-if="deleteIdeaModal" :deleteIdeaModal="deleteIdeaModal" @close="deleteIdeaModal = false">
            <h5 class="modal-title" slot="title">Delete Idea</h5>
            <template>
                <p class="mb-3"><b>Are you sure you want to delete this idea?</b></p>
                <button type="submit" class="btn btn-danger" @click.prevent="deleteIdea(editId)">Delete</button>
                <button type="submit" class="btn btn-gray" @click="deleteIdeaModal = false">Cancel</button>
            </template>
        </bb-modal>
        <!-- Delete Modal End -->
        <!-- Delete Alert -->
        <b-alert class="fade-el" variant="danger" dismissible :show="showDeleted" @dismissed="showDeleted=false">
            You have successfully deleted the idea!
        </b-alert>
        <!-- Added Alert -->
        <div class="row d-flex bg-lightgray p-3 pt-lg-5 mt-4 rounded gray-border justify-content-around">
            <div v-for="(idea, index) in ideas" :key="idea.id" class="idea-list">
                <a href="#" class="delete-idea-btn" @click="confirmDelete(idea.id, index)"><i class="fas fa-times"></i></a>
                <bb-idea :idea="idea" :index="index" :unique="idea.id" :ideaTitle="idea.title" :ideaDescription="idea.description"
                    :boardId="board.id"></bb-idea>
            </div>
        </div>
    </div>
</template>
<script>
    import BBIdea from '../components/BBIdea';
    import BBModal from '../components/BBModal';

    export default {

        props: ['board'],

        data() {
            return {
                ideas: [],
                idea: {},
                editId: '',
                editIndex: '',
                deleteIdeaModal: false,
                showDeleted: false
            }
        },

        mounted() {
            this.getIdeas();
        },

        created() {
            Event.$on('created', () => this.getIdeas());
        },

        methods: {
            createIdea() {
                this.ideas.unshift(this.idea);
            },
            getIdeas() {
                axios.get('/boards/' + this.board.id + '/ideas')
                    .then((response) => {
                        this.ideas = response.data;
                    });
            },
            confirmDelete(id, index) {
                axios.get('/boards/' + this.board.id + '/ideas/' + id + '/edit').
                then((response) => {
                        this.editId = id;
                        this.editIndex = index;
                    })
                    .catch(error => {
                        this.$swal("Something is wrong! You can't delete this idea");
                    });
                this.deleteIdeaModal = true;
            },
            deleteIdea(id) {
                axios.delete('/boards/' + this.board.id + '/ideas/' + id)
                    .then((response) => {
                        this.deleteIdeaModal = false;
                        this.$delete(this.ideas, this.editIndex);
                        this.editId = '';
                        this.editIndex = '';
                        this.showDeleted = true;
                    }).catch(error => {
                        this.$swal("Something is wrong! We're not able to delete the board.");
                    });

            }
        }
    }

</script>
