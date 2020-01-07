@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                @php
                    $i = 1
                @endphp
                @foreach($posts as $post)
                    @if($i%2 !== 0 )
                        <div class="row mb-2 border border-dark rounded">
                            <div class="col-3 w-25 mt-1 mb-1">
                                <a href="/post/{{$post->id}}">
                                    <img src="{{asset($post->image)}}" class="img-fluid" alt="Foto do post">
                                </a>
                            </div>
                            <div class="col-9">
                                <a href="/post/{{$post->id}}" class="text-info">
                                    <h3 >{{ $post->title  }}</h3>
                                </a>
                                <hr class="m-0">
                                <a href="/post/{{$post->id}}" class="text-dark">
                                    <p class="text-justify">{{ $post->resume }}</p>
                                </a>
                            </div>
                        </div>
                        @php
                            $i = $i + 1
                        @endphp
                    @else
                        @php
                            $i = $i + 1
                        @endphp
                        <div class="row mb-2 border border-dark rounded">
                            <div class="col-9">
                                <a href="/post/{{$post->id}}" class="text-info">
                                    <h3>{{ $post->title  }}</h3>
                                </a>
                                <hr class="m-0">
                                <a href="/post/{{$post->id}}" class="text-dark">
                                    <p class="text-justify">{{ $post->resume }}</p>
                                </a>
                            </div>
                            <div class="col-3 w-25 mt-1 mb-1">
                                <a href="/post/{{$post->id}}">
                                    <img src="{{asset($post->image)}}" class="img-fluid" alt="Foto do post">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-3">Anúncios</div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection
