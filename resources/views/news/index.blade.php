@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Notícias
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @php
                    $i = 1
                @endphp
                @foreach($notices as $notice)
                    @if($i%2 !== 0 )
                        <div class="row mb-2 border border-dark rounded">
                            <div class="col-3 w-25 mt-1 mb-1">
                                <a href="{{route('post.get', ['id' => $notice->id, 'link' => $notice->link])}}">
                                    <img src="{{$notice->image}}" class="img-fluid img-thumbnail" style="max-height: 160px;" alt="Foto do post">
                                </a>
                            </div>
                            <div class="col-9">
                                <a href="{{route('post.get', ['id' => $notice->id, 'link' => $notice->link])}}" class="text-info">
                                    <h3 class="mb-0" style="font-size: 2rem;">{{ $notice->title  }}</h3>
                                </a>
                                <p class="text-muted font-weight-lighter m-0" style="font-size: 0.8rem;">{{date('d-m-Y', strtotime($notice->created_at))}}</p>
                                <hr class="m-0">
                                <p class="text-justify" style="font-size: 1rem;">{{ $notice->resume }}</p>
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
                                <a href="{{route('post.get', ['id' => $notice->id, 'link' => $notice->link])}}" class="text-info">
                                    <h3 class="mb-0" style="font-size: 2rem;">{{ $notice->title  }}</h3>
                                </a>
                                <p class="text-muted font-weight-lighter m-0" style="font-size: 0.8rem;">{{date('d-m-Y', strtotime($notice->created_at))}}</p>
                                <hr class="m-0">
                                <p class="text-justify">{{ $notice->resume }}</p>
                            </div>
                            <div class="col-3 w-25 mt-1 mb-1">
                                <a href="{{route('post.get', ['id' => $notice->id, 'link' => $notice->link])}}">
                                    <img src="{{$notice->image}}" class="img-fluid img-thumbnail" style="max-height: 160px;" alt="{{$notice->title}}">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">{{ $notices->links() }}</div>
        </div>
    </div>
@endsection
