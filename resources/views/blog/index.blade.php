@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Painel do Blog
@endsection

@section('content')
    <div class="container-fluid mr-0">
        <a href="{{route('cadastrarPost')}}" class="btn btn-primary mb-2">Novo Post</a>
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary">
                <div class="row">
                    <div class="col-sm border-right">Título</div>
                    <div class="col-sm-8">Texto</div>
                </div>
            </li>
            @foreach($posts as $post)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm">{{$post->title}}</div>
                        <div class="col-sm-10">{{$post->text}}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection