@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Gerenciamento de Mensagens
@endsection

@section('content')
<div class="container-fluid ">
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
    <ul class="list-group rounded ">
        <li class="list-group-item list-group-item-secondary">
            <div class="row">
                <div class="col-3 col-md-3 border-right border-dark">Nome</div>
                <div class="col-6 col-md-6 border-right border-dark">Assunto</div>
                <div class="col-3 col-md-3">Ações</div>
            </div>
        </li>
        @foreach($messages as $message)
        <li class="list-group-item">
            <div class="row align-items-center">
                <div class="col-3 col-md-3 border-right">
                    <p class="text-justify">{{$message->name}}</p>
                </div>
                <div class="col-6 col-md-6 border-right">
                    <p class="text-justify">{{$message->title}}</p>
                </div>
                <div class="col-3 col-md-3 d-flex flex-wrap">
                    <a href="{{route('admin.contact.destroy', ['id' => $message->id])}}" class="btn btn-danger mr-1 mb-1 wh-40"
                        title="Apagar mensagem"><i class="fas fa-trash-alt"></i></a>
                    <a href="{{route('admin.contact.show', ['id' => $message->id])}}" class="btn btn-primary wh-40"
                        title="Visualizar mensagem"><i class="fas fa-eye"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection