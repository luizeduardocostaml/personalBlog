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

    <div class="row">{{$notice->title}}</div>
    <div class="ml-3 w-50">
        <h6 class="font-weight-lighter text-secondary">{{$notice->resume}}</h6>
    </div>
@endsection

@section('content')
    <div class="container min-vh-100" >
        <img src="{{$notice->image}}" class="rounded float-right w-25 img-thumbnail" alt="Post image">
        {!! $notice->text !!}
    </div>

    <div>
        <hr class="my-4">
        <h5>Autor</h5>
        <div class="row">
            <div class="col-2"><img src="{{$author->image}}" class="img-fluid" alt="Foto do autor"></div>
            <div class="col-10">
                <h4 class="card-title">{{$author->name}}</h4>
                <p class="card-text">{{$author->biography}}</p>
            </div>
        </div>
    </div>
@endsection
