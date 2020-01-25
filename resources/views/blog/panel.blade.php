@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
    <div class="container-fluid row">
        <a href="{{route('admin.panel')}}" class="btn"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
    </div>
@endsection

@section('title')
    Painel do Blog
@endsection

@section('content')
    <div class="container-fluid mr-0">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{route('post.getRegister')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo Post</a>
        <ul class="list-group shadow rounded ">
            <li class="list-group-item list-group-item-secondary">
                <div class="row justify-content-between">
                    <div class="col border-right border-dark">Título</div>
                    <div class="col col-sm-7 border-right border-dark">Resumo</div>
                    <div class="col col-lg-2">Ações</div>
                </div>
            </li>
            @foreach($posts as $post)
                <li class="list-group-item d-inline">
                    <div class="row align-items-center">
                        <div class="col border-right">
                            <p class="text-justify">{{$post->title}}</p>
                        </div>
                        <div class="col col-sm-7 border-right">
                            <p class="text-justify">{{$post->resume}}</p>
                        </div>
                        <div class="col col-lg-2 d-flex">
                            <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-danger mr-1" title="Apagar Post"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{route('post.getEdit', ['id' => $post->id])}}" class="btn btn-primary mr-1 pr-2" title="Editar Post"><i class="fas fa-edit"></i></a>
                            <a href="{{route('post.get', ['id' => $post->id, 'link' => $post->link])}}" class="btn btn-primary" title="Visualizar Post"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
