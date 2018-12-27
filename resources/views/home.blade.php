@extends('layouts.app')

@section('content')
<div class="container" id="dashboard-page">
    <div class="row d-flex justify-content-between mb-md-5">
        <h2>Current Boards</h2>
        <a href="#" class="button-outline green-border" @click="showModal = true">Create board</a>
        <!-- Modal -->
        <bb-modal v-show="showModal" @close="showModal = false">
          <h5 class="modal-title" slot="title">Create your board</h5>
          <template slot="body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Board title</label>
                <input type="boardTitle" class="form-control" id="exampleInputboardTitle1" aria-describedby="boardTitleHelp">
              </div>
            </form>
          </template>
          <template slot="footer">
            <button type="button" class="btn btn-secondary">Create</button>
          </template>
        </bb-modal>
        <!-- Modal end -->
    </div>
    <div class="row justify-content-center">
        <div class="col px-0 card table-responsive">
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
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td>App Ideas</td>
                  <td>12/12/2018</td>
                  <td>John Doe</td>
                  <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-blue btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

