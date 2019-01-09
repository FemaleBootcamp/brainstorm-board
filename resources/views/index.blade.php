@extends('layouts.app')

@section('content')
<div class="container" id="dashboard-page">
    <div class="row d-flex justify-content-between mb-md-5">
        <h2>Current Boards</h2>
        <a href="#" class="button-outline green-border" @click="showModal = true">Create board</a>
        <!-- Modal -->
        <bb-modal v-show="showModal" @close="showModal = false">
            <h5 class="modal-title" slot="title">Create your board</h5>
        </bb-modal>
        <!-- End Modal -->
    </div>
    <div class="row justify-content-center">
        <div class="col px-0 card table-responsive">
            <bb-data-table></bb-data-table>
        </div>
    </div>
</div>
@endsection
