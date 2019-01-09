<template>
    <div>
        <!-- Edit Modal -->
        <bb-modal v-show="showEditModal" @close="showEditModal = false">
            <h5 class="modal-title" slot="title">Edit board</h5>
            <template>
                <form method="POST" action="/boards" @submit.prevent="onUpdate()" @keydown="errors.clear($event.target.name)">
                    <div class="form-group">
                        <label for="title">Board title</label>
                        <input ref="title" type="boardTitle" class="form-control" id="title" v-model="board.title" name="title"
                            aria-describedby="titleHelp">
                        <span class="help-field" v-if="errors.has('title')" v-text="errors.get('title')"></span>
                    </div>
                    <button class="btn btn-secondary" id="create-board" type="submit" :disabled="errors.any()">Update</button>
                </form>
            </template>
        </bb-modal>
        <!-- Edit Modal End -->
        <b-alert class="fade-el" variant="danger" dismissible :show="showDeleted" @dismissed="showDeleted=false">
            You have successfully deleted the record!
        </b-alert>
        <b-alert class="fade-el" variant="info" dismissible :show="showAdded" @dismissed="showAdded=false">
            You have successfully added the record!
        </b-alert>
        <table id="dashboardTable" class="table table-bordered table-sm text-center" cellspacing="0" width="100%">
            <thead class="bg-lightgray">
                <tr>
                    <th class="th-sm">Title</th>
                    <th class="th-sm">Date</th>
                    <th class="th-sm">Author</th>
                    <th class="th-sm">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="board in boards" :key="board.id">
                    <td :title="title">{{ board.title }}</td>
                    <td :date="date">{{ formatDate(board.created_at) }}</td>
                    <td :user="user">{{ board.user.name }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                        <a href="#" class="btn btn-blue btn-sm" @click="editBoard(board.id)">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm" @click.prevent="deleteBoard(board.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</template>
<script>
    import moment from 'moment';
    import Board from '../models/Board';
    import Errors from '../models/Errors';
    import BBModal from '../components/BBModal';

    export default {

        data() {

            return {

                boards: [],
                board: {},
                showDeleted: false,
                showAdded: false,
                showEditModal: false,
                title: '',
                date: '',
                user: '',
                errors: new Errors()

            }

        },

        mounted() {
            Board.all(boards => this.boards = boards);
        },

        created() {
            Event.$on('submit', () => Board.all(boards => this.boards = boards));
            Event.$on('submit', () => this.showAdded = true);
        },

        methods: {

            formatDate(board) {
                return moment(board.created_at).format('MM/DD/YYYY');
            },
            editBoard(id) {
                axios.get(`/boards/${id}/edit`, {
                    params: {
                        id: `${id}`
                    }
                }).then(response => {
                    this.board = response.data;
                }).catch(error => {
                    this.$swal("Something is wrong! You can't edit this board");
                });
                this.showEditModal = true;
            },
            deleteBoard(id) {
                axios.post(`/boards/${id}`, {
                    params: {
                        id: `${id}`
                    },
                    _method: 'delete'
                }).then(() => {
                    let index = this.boards.findIndex(board => board.id === id);
                    this.boards.splice(index, 1);
                    this.showDeleted = true;
                }).catch(error => {
                    this.$swal("Something is wrong! We're not able to delete the board.");
                });

            }

        }

    }

</script>
