@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Cadastrar Post
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-1">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('registrarPost')}}" method="POST" class="m-1">
        @csrf
        <div class="form-group bg-light p-3 border border-dark rounded">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Título do post">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded">
            <label for="text">Texto</label>
            <textarea class="form-control" name="text" id="text" placeholder="Corpo do post" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection