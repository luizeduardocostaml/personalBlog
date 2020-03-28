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

    <div class="row">{{$post->title}}</div>
    <p class="text-muted font-weight-lighter m-0" style="font-size: 0.8rem;">Publicado em {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y h:i:s') }} {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
    <div class="m-3 w-75">
        <h6 class="font-weight-lighter text-secondary">{{$post->resume}}</h6>
    </div>
@endsection

@section('content')
    <div class="container min-vh-100" >
        <img src="{{$post->image}}" class="rounded float-right post-image img-thumbnail" alt="Post image">
        {!! $post->text !!}
    </div>

    <div class="d-flex flex-column flex-wrap">
        <hr class="my-4 w-100">
        <h5>Autor</h5>
        <div class="d-flex flex-wrap">
            <div class="author-image m-1"><img src="{{$author->image}}" class="img-fluid" alt="Foto do autor"></div>
            <div class="flex-grow-1 m-1">
                <h4 class="card-title">{{$author->name}}</h4>
                <p class="card-text">{{$author->biography}}</p>
            </div>
        </div>
    </div>
@endsection
