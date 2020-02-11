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
                    <div class="col border-right border-dark">Nome</div>
                    <div class="col col-sm-7 border-right border-dark">Assunto</div>
                    <div class="col col-lg-2">Ações</div>
                </div>
            </li>
            @foreach($messages as $message)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col border-right">
                            <p class="text-justify">{{$message->name}}</p>
                        </div>
                        <div class="col col-sm-7 border-right">
                            <p class="text-justify">{{$message->title}}</p>
                        </div>
                        <div class="col col-lg-2">
                            <a href="{{route('contact.delete', ['id' => $message->id])}}" class="btn btn-danger mr-1" title="Apagar mensagem"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{route('contact.message', ['id' => $message->id])}}" class="btn btn-primary" title="Visualizar mensagem"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
