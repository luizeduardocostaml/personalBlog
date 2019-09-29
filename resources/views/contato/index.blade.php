@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Painel de Mensagens
@endsection

@section('content')
<div class="container-fluid">
    <ul class="list-group">
        <li class="list-group-item list-group-item-secondary">
            <div class="row">
                <div class="col-sm border-right">Nome</div>
                <div class="col-sm-8">Assunto</div>
            </div>
        </li>
        @foreach($messages as $message)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm border-right">
                        {{$message->name}}
                    </div>
                    <div class="col-sm-8">
                        {{$message->title}}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection