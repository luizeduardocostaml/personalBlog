@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
    <div class="container-fluid row">
        <a href="{{url()->previous()}}" class="btn backButton"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
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

            <a href="{{route('contact.delete', ['id' => $message->id])}}" class="btn btn-danger m-1"><i class="fas fa-trash-alt mr-1"></i>Apagar</a>
            <div class="row">
                <hr class="w-25 ml-0 mt-0 ">
            </div>
            <div class="container">
                @if($message->answer === ' ')
                    <form action="{{route('contact.answer', ['id' => $message->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3">
                            <label for="text">Resposta</label>
                            <textarea name="answer" id="answer" rows="3" class="form-control" placeholder="Resposta"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-reply mr-1"></i>Responder</button>
                    </form>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resposta</h5>
                            <p class="card-text">{{$message->answer}}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
