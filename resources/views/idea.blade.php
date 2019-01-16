@extends('layouts.app')

@section('content')
<div class="container" id="board-page">
    <div class="row d-flex justify-content-center mb-3">
    <a class="btn-title" href=" {{ url('index') }} "><h4 class="p-3 rounded bg-primary white"><i class="far fa-lightbulb"></i><span>&nbsp; {{ $board->title }} Board </span></h4></a>
    </div>
    <bb-ideas-list :board="{{ $board }}" :board-ideas="{{ json_encode($board->ideas) }}"></bb-ideas-list>
</div>
@endsection
