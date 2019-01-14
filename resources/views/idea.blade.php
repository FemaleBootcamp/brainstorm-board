@extends('layouts.app')

@section('content')
<div class="container" id="board-page">
    <div class="row d-flex justify-content-center mb-3">
        <h2 class="p-3 rounded bg-primary white"><i class="far fa-lightbulb"></i> {{ $board->title }} Board</h2><br>
    </div>
    <bb-ideas-list :board="{{ $board }}" :board-ideas="{{ json_encode($board->ideas) }}"></bb-ideas-list>
</div>
@endsection
