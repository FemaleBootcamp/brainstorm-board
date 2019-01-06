<template>
    <div>
        <b-alert variant="danger" dismissible :show="show" @dismissed="show=false">
            You have successfully deleted the record!
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
                    <td>{{ board.title }}</td>
                    <td>{{ formatDate(board.created_at) }}</td>
                    <td>{{ board.user.name }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                        <a href="#" class="btn btn-blue btn-sm">Edit</a>
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

export default {

    data() {

        return {

            boards: [],
            show: false

        }

    },

    created() {

        Board.all(boards => this.boards = boards);

    },

    methods: {

        formatDate(board) {
            return moment(board.created_at).format('MM/DD/YYYY');
        },

        deleteBoard(id) {
            axios.post(`/boards/${id}`, { params: { id: `${id}` }, _method: 'delete' }).then(() => {
                let index = this.boards.findIndex(board => board.id === id);
                this.boards.splice(index, 1);
                this.show = true;
            });
        }

    }

}

</script>
