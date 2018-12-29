@extends('layouts.app')

@section('content')
<div class="container" id="board-page">
    <div class="row d-flex justify-content-center mb-3">
        <h2 class="p-3 rounded bg-primary white"><i class="far fa-lightbulb"></i> Idea Board</h2><br>
    </div>
    <div class="row justify-content-center mb-3">
        <a href="#" class="button-outline green-border idea-btn">New Idea</a>
    </div>
    <div class="row justify-content-center mb-3">
      <div class="input-group col-md-5 col-sm-12 col-xs-12">
        <select class="custom-select" id="inputGroupSelect04">
          <option selected disabled>Sort ideas by...</option>
          <option value="1">Alphabetical order</option>
          <option value="2">Date</option>
          <option value="3">Author</option>
        </select>
      </div>
    </div>
    <!-- Sticky notes -->
    <div class="row d-flex bg-lightgray p-3 pt-lg-5 mt-4 rounded gray-border justify-content-around">
      <!-- Note Start -->
      <div class="card sticky-notes mb-5">
        <div class="card-header bg-primary">
          <textarea name="title" cols="30" rows="1" class="bold white">My new idea</textarea>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><textarea name="description" cols="30" rows="8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam justo turpis, ornare ac magna id, auctor congue risus. Nunc urna dui, tristique non dolor sed, scelerisque tempor nisl.</textarea></li>
        </ul>
      </div>
      <!-- Note Start -->
      <div class="card sticky-notes mb-5">
        <div class="card-header bg-secondary">
          <textarea name="title" cols="30" rows="1" class="bold white">My second idea</textarea>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><textarea name="description" cols="30" rows="8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam justo turpis, ornare ac magna id, auctor congue risus. Nunc urna dui, tristique non dolor sed, scelerisque tempor nisl.</textarea></li>
        </ul>
      </div>
      <!-- Note Start -->
      <div class="card sticky-notes mb-5">
        <div class="card-header bg-blue">
          <textarea name="title" cols="30" rows="1" class="bold white">My third idea</textarea>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><textarea name="description" cols="30" rows="8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam justo turpis, ornare ac magna id, auctor congue risus. Nunc urna dui, tristique non dolor sed, scelerisque tempor nisl.</textarea></li>
        </ul>
      </div>
    </div>
</div>
@endsection

