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
        <div class="row d-flex bg-lightgray p-3 pt-5  mt-4 rounded gray-border justify-content-around">
            <!-- Loader -->
            <div v-show="loader" class="col-12 mb-4">
                <bb-loader></bb-loader>
            </div>
            <!-- No records notice -->
            <div v-show="checkIdeas" class="col-12">
                <p class="bg-gray py-3 rounded text-center">There aren't any ideas yet.</p>
            </div>
            <!-- Ideas List -->
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
    import BBLoader from '../components/BBLoader';

    export default {

        props: ['board'],

        data() {
            return {
                ideas: [],
                idea: {},
                loader: false,
                checkIdeas: false,
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
            Event.$on('created', (saved) => this.getIdeas(saved));
        },

        methods: {
            createIdea() {
                this.checkIdeas = false;
                this.ideas.unshift(this.idea);
            },
            checkIdeasStatus(length) {
                length == 0 ? this.checkIdeas = true : this.checkIdeas = false;
            },
            getIdeas(saved) {
                saved ? this.loader = false : this.loader = true;
                axios.get('/boards/' + this.board.id + '/ideas')
                    .then((response) => {
                        this.loader = false;
                        this.ideas = response.data;
                        this.checkIdeasStatus(this.ideas.length);
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
                        this.checkIdeasStatus(this.ideas.length);
                    }).catch(error => {
                        this.$swal("Something is wrong! We're not able to delete the board.");
                    });

            }
        }
    }

</script>
