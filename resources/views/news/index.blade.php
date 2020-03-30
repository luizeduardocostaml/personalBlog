@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Notícias
@endsection

@section('content')
    <div class="container d-flex flex-column">
        @foreach($notices as $notice)
            <div class="d-flex flex-row flex-wrap flex-grow-1 mb-2 border border-dark rounded">
                <div class="post-image m-2">
                    <a href="{{route('news.get', ['id' => $notice->id, 'link' => $notice->link])}}">
                        <img src="{{$notice->image}}" class="img-fluid img-thumbnail"
                             alt="Foto do post">
                    </a>
                </div>
                <div class="flex-grow-1 m-1">
                    <a href="{{route('news.get', ['id' => $notice->id, 'link' => $notice->link])}}"
                       class="text-info">
                        <h3 class="mb-0 text-break" style="font-size: 2rem;">{{ $notice->title  }}</h3>
                    </a>
                    <p class="text-muted font-weight-lighter m-0 text-break" style="font-size: 0.8rem;">Publicado
                        em {{ \Carbon\Carbon::parse($notice->created_at)->format('d/m/Y h:i:s') }} {{ \Carbon\Carbon::parse($notice->created_at)->diffForHumans() }}</p>
                    <hr class="m-0">
                    <p class="text-justify text-break" style="font-size: 1rem;">{{ $notice->resume }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">{{ $notices->links() }}</div>
        </div>
    </div>
@endsection
