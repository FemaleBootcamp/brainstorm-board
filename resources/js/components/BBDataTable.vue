<template>
    <div>
        <!-- Edit Modal -->
        <bb-modal v-show="showEditModal" @close="showEditModal = false">
            <h5 class="modal-title" slot="title">Edit board</h5>
            <template>
                <form method="POST" action="/boards" @submit.prevent="onUpdate(board.id)" @keydown="errors.clear($event.target.name)">
                    <div class="form-group">
                        <label for="title">Board title</label>
                        <input ref="title" type="boardTitle" class="form-control" id="title" v-model="board.title" name="title"
                            aria-describedby="titleHelp">
                        <span class="help-field" v-if="errors.has('title')" v-text="errors.get('title')"></span>
                    </div>
                    <button class="btn btn-blue" id="create-board" type="submit" :disabled="errors.any()">Update</button>
                </form>
            </template>
        </bb-modal>
        <!-- Edit Modal End -->
        <!-- Delete Modal Start -->
        <bb-modal v-show="showDeleteModal" @close="showDeleteModal = false">
            <h5 class="modal-title" slot="title">Delete board</h5>
            <template>
                <p class="mb-0"><b>Are you sure you want to delete he the board {{ board.title }}?</b></p>
                <p>This action is permanent and it cannot be undone.</p>
                <button type="submit" class="btn btn-danger" @click.prevent="deleteBoard(board.id)">Delete</button>
                <button type="submit" class="btn btn-gray" @click="showDeleteModal = false">Cancel</button>
            </template>
        </bb-modal>
        <!-- Delete Modal ENd -->
        <!-- Delete Alert -->
        <b-alert class="fade-el" variant="danger" dismissible :show="showDeleted" @dismissed="showDeleted=false">
            You have successfully deleted the record!
        </b-alert>
        <!-- Added Alert -->
        <b-alert class="fade-el" variant="info" dismissible :show="showAdded" @dismissed="showAdded=false">
            You have successfully added the record!
        </b-alert>
        <!-- Update Alert -->
        <b-alert class="fade-el" variant="success" dismissible :show="showUpdated" @dismissed="showUpdated=false">
            You have successfully updated the record!
        </b-alert>
        <!-- End Alerts -->
        <!-- Filter -->
        <div class="form-group">
            <label for="filterByDate" class="pl-2">Filter Boards</label>
            <div class="row">
                <select class="form-control col-md-3 ml-3" id="filterByDate" v-model="selected" @change="onChange(selected)">
                    <option v-for="param in filterParams" v-bind:value="param.value" :key="param.value">
                        {{ param.text }}
                    </option>
                </select>
            </div>
        </div>
        <!-- Table Start -->
        <table border="2" id="dashboardTable" class="table table-bordered table-sm text-center" cellspacing="0" width="100%">
            <thead class="bg-lightgray">
                <tr>
                    <th class="th-sm">Title</th>
                    <th class="th-sm">Date</th>
                    <th class="th-sm">Author</th>
                    <th class="th-sm">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="board in boards.data" :key="board.id">
                    <td :title="title">{{ board.title }}</td>
                    <td :date="date">{{ formatDate(board.created_at) }}</td>
                    <td :user="user">{{ board.user.name }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                        <a href="#" class="btn btn-blue btn-sm" @click="editBoard(board.id)">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm" @click="confirmDelete(board.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <!-- Pagination -->
        <pagination :data="boards" :limit="5" @pagination-change-page="filterData"></pagination>
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

                boards: {},
                board: {},
                showDeleted: false,
                showAdded: false,
                showEditModal: false,
                showDeleteModal: false,
                showUpdated: false,
                title: '',
                date: '',
                user: '',
                errors: new Errors(),
                selected: 'all',
                filterParams: [{
                        text: 'All',
                        value: 'all'
                    },
                    {
                        text: 'Today',
                        value: 'day'
                    },
                    {
                        text: 'This week',
                        value: 'week'
                    },
                    {
                        text: 'This month',
                        value: 'month'
                    }
                ]
            }

        },
        mounted() {
            this.getBoards();
        },

        created() {
            Event.$on('submit', () => this.getBoards());
            Event.$on('updated', () => this.getBoards());
            Event.$on('submit', () => this.showAdded = true);
            Event.$on('updated', () => this.showUpdated = true);
        },

        methods: {

            getBoards() {
                Board.all(boards => this.boards = boards);
            },
            onChange(param) {
                axios.get(`/boards?param=` + param)
                    .then(response => {
                        this.boards = response.data;
                    });
            },
            filterData(page = 1) {
                axios.get('/boards?page=' + page)
                    .then(response => {
                        this.boards = response.data;
                    });
            },
            formatDate(board) {
                return moment(board).format('DD/MM/YYYY');
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
            confirmDelete(id) {
                axios.get(`/boards/${id}`, {
                    params: {
                        id: `${id}`
                    }
                }).then(response => {
                    this.board = response.data;
                }).catch(error => {
                    this.$swal("Something is wrong! You can't delete this board");
                });
                this.showDeleteModal = true;
            },
            deleteBoard(id) {
                axios.post(`/boards/${id}`, {
                    params: {
                        id: `${id}`
                    },
                    _method: 'delete'
                }).then((response) => {
                    this.showDeleteModal = false;
                    let index = this.boards.data.findIndex(board => board.id === id);
                    this.boards.data.splice(index, 1);
                    this.showDeleted = true;
                }).catch(error => {
                    this.$swal("Something is wrong! We're not able to delete the board.");
                });

            },
            onUpdate(id) {
                axios.post(`/boards/${id}`, {
                    title: this.board.title,
                    params: {
                        id: `${id}`
                    },
                    _method: 'patch'
                }).then(response => {
                    this.showEditModal = false;
                    Event.$emit('updated');
                }).catch(error => {
                    this.errors.record(error.response.data.errors);
                });
            }

        }

    }

</script>
