@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Gerenciamento de Notícias
@endsection

@section('content')
<div class="container-fluid mr-0 p-1">
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
    <a href="{{route('news.getRegister')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Nova
        Notícia</a>
    <ul class="list-group shadow rounded ">
        <li class="list-group-item list-group-item-secondary">
            <div class="row">
                <div class="col-3 col-md-3 border-right border-dark">Título</div>
                <div class="col-6 col-md-6 border-right border-dark">Resumo</div>
                <div class="col-3 col-md-3">Ações</div>
            </div>
        </li>
        @foreach($notices as $notice)
        <li class="list-group-item d-inline">
            <div class="row">
                <div class="col-3 col-md-3 border-right">
                    <p class="text-justify">{{$notice->title}}</p>
                </div>
                <div class="col-6 col-md-6 border-right">
                    <p class="text-justify">{{$notice->resume}}</p>
                </div>
                <div class="col-3 col-md-3 d-flex flex-wrap">
                    <a href="{{route('news.delete', ['id' => $notice->id])}}" class="btn btn-danger mr-1 mb-1 wh-40"
                        title="Apagar Notícia"><i class="fas fa-trash-alt"></i></a>
                    <a href="{{route('news.getEdit', ['id' => $notice->id])}}" class="btn btn-primary mr-1 mb-1 wh-40"
                        title="Editar Notícia"><i class="fas fa-edit"></i></a>
                    <a href="{{route('news.get', ['id' => $notice->id, 'link' => $notice->link])}}"
                        class="btn btn-primary wh-40" title="Visualizar Notícia"><i class="fas fa-eye"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection