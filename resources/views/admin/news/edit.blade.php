@extends('layouts.admin')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
    <div class="container-fluid row">
        <a href="{{url()->previous()}}" class="btn backButton"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
    </div>
@endsection

@section('title')
    Editar Notícia
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-1">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('news.edit')}}" method="POST" class="m-1">
        @csrf
        <input type="text" name="id" id="id" value="{{$notice->id}}" hidden>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$notice->title}}" placeholder="Título do post">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="resume">Resumo</label>
            <input type="text" class="form-control" name="resume" id="resume" value="{{$notice->resume}}" placeholder="Resumo do texto">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="text">Texto</label>
            <textarea class="form-control" name="text" id="text" placeholder="Corpo do post" rows="3">{{$notice->text}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary shadow ml-2">Editar</button>
    </form>
@endsection
