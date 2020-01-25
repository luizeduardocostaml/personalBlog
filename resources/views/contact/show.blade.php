@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
    <div class="container-fluid row">
        <a href="{{url()->previous()}}" class="btn"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
    </div>
@endsection

@section('title')
    <div class="row">Mensagem de {{$message->name}}</div>

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <p><b>Autor: </b> {{$message->name}}</p>
            <p><b>E-mail: </b> {{$message->email}}</p>
            <p><b>Título: </b> {{$message->title}}</p>
            <div>
                <b>Mensagem</b>
                <p>{{$message->text}}</p>
            </div>
            <hr class="w-25 ml-0 mt-0 ">
            <a href="" class="btn btn-primary"><i class="fas fa-reply mr-1"></i>Responder</a>
            <a href="{{route('contact.delete', ['id' => $message->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Apagar</a>
        </div>
    </div>
@endsection
