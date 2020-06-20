@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Gerenciamento do Blog
@endsection

@section('content')
<div class="container-fluid mr-0">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{route('post.getRegister')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo
        Post</a>
    <ul class="list-group shadow rounded ">
        <li class="list-group-item list-group-item-secondary">
            <div class="row justify-content-between">
                <div class="col-3 col-md-3 border-right border-dark">Título</div>
                <div class="col-6 col-md-6 border-right border-dark">Resumo</div>
                <div class="col-3 col-md-3">Ações</div>
            </div>
        </li>
        @foreach($posts as $post)
        <li class="list-group-item d-inline">
            <div class="row align-items-center">
                <div class="col-3 col-md-3 border-right">
                    <p class="text-justify">{{$post->title}}</p>
                </div>
                <div class="col-6 col-md-6 border-right">
                    <p class="text-justify">{{$post->resume}}</p>
                </div>
                <div class="col-3 col-md-3 d-flex flex-wrap">
                    <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-danger mr-1 mb-1 wh-40"
                        title="Apagar Post"><i class="fas fa-trash-alt"></i></a>
                    <a href="{{route('post.getEdit', ['id' => $post->id])}}" class="btn btn-primary mr-1 mb-1 wh-40"
                        title="Editar Post"><i class="fas fa-edit"></i></a>
                    <a href="{{route('post.get', ['id' => $post->id, 'link' => $post->link])}}"
                        class="btn btn-primary wh-40" title="Visualizar Post"><i class="fas fa-eye"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection