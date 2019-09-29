@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Painel do Blog
@endsection

@section('content')
    <div class="container-fluid mr-0">
        <a href="{{route('cadastrarPost')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo Post</a>
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
                            <a href="/deletePost/{{$post->id}}" class="btn btn-danger mr-1"><i class="fas fa-trash-alt"></i></a>
                            <a href="" class="btn btn-primary "><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection