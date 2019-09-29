@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Painel do Blog
@endsection

@section('content')
<ul class="list-group">
    @foreach($posts as $post)
    <li class="list-group-item">
        <div class="row">
            <div class="col-sm">{{$post->title}}</div>
            <div class="col-sm-10">{{$post->text}}</div>
        </div>
    </li>
    @endforeach
</ul>
@endsection