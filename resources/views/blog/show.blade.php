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

    <div class="row">{{$post->title}}</div>
    <div class="ml-3 w-50">
        <h6 class="font-weight-lighter text-secondary">{{$post->resume}}</h6>
    </div>
@endsection

@section('content')
    <div class="vh-100">
        <div class="float-right w-25">
            <img src="{{asset($post->image)}}" class="img-fluid" alt="Post image">
        </div>
        {!! $post->text !!}
    </div>
@endsection
