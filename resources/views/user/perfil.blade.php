@extends('layouts.index')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
@endsection

@section('title')
<div class="row">Perfil</div>
@endsection

@section('content')
<div class="row">
    <div class="col-8 col-md-4 col-lg-2 mx-auto">
        <img src="{{$user->image_url}}" class="rounded-circle mx-auto d-block w-100" alt="Foto do autor">
    </div>
</div>
<div class="row">
    <p class="mx-auto font-weight-bold text-monospace m-0">
        {{$user->name}}
    </p>
</div>
<div class="row mb-1">
    <p class="mx-auto font-weight-light m-0">
        {{$user->title?:'Escritor'}}
    </p>
</div>
<div class="row">
    <div class="col-12 col-lg-6 mb-2">
        <div class="w-100 border rounded border-dark h-100">
            <div class="w-100 border-bottom border-dark bg-dark text-light text-center">
                Estatísticas
            </div>
            <div>
                <p class="m-1">
                    Número de postagens: {{count($user->posts)}}
                </p>
                <p class="m-1">
                    Número de notícias: {{count($user->noticias)}}
                </p>
                <p class="m-1">
                    Número de blogs: {{count($user->blogs)}}
                </p>
                <p class="m-1">
                    Postagem mais famosa: <a href="{{$user->most_viewed_post->url}}">{{$user->most_viewed_post->title}}</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mb-2">
        <div class="w-100 border rounded border-dark h-100">
            <div class="w-100 border-bottom border-dark bg-dark text-light text-center">
                Últimas postagens
            </div>
            <div>
                @foreach ($user->last_posts as $post)
                    <p class="m-1">
                        <a href="{{$post->url}}">{{$post->title}}</a>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection