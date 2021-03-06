@extends('layouts.index')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
<div class="d-flex w-100 justify-content-between">
    <a href="{{url()->previous()}}" class="btn align-items-center backButton"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
    @auth<div>{{ $post->views }} visualizações</div>@endauth
</div>
@endsection

@section('title')

<div class="row">{{$post->title}}</div>
<p class="text-muted font-weight-lighter m-0" style="font-size: 0.8rem;">Publicado em
    {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y h:i:s') }}
    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
<div class="m-3 w-75">
    <h6 class="font-weight-lighter text-secondary">{{$post->resume}}</h6>
</div>
@endsection

@section('content')
<div class="container min-vh-100">
    <img src="{{$post->image_url}}" class="rounded float-right post-image img-thumbnail" alt="Post image">
    {!! $post->text !!}
</div>


<div class="row">
    <hr class="my-4 w-100">
</div>
<div class="row">
    <h5>Autor</h5>
</div>
<div class="row">
    <div class="col-12 col-md-4 col-lg-2 mt-2 mb-2">
        <img src="{{$post->author->image_url}}" class="img-fluid" alt="Foto do autor">
    </div>
    <div class="col-12 col-md-8 col-lg-10 mt-1 mb-1">
        <h4 class="card-title">{{$post->author->name}}</h4>
        <p class="card-text">{{$post->author->biography}}</p>
    </div>
</div>
@endsection