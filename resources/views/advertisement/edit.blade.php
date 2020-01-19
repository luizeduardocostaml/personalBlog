@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Editar Anúncio
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-1">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('editAd')}}" method="POST" class="m-1" enctype="multipart/form-data">
        @csrf
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="title">Nome</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Anúncio" value="{{$ad->name}}">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="resume">Link</label>
            <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="{{$ad->link}}">
        </div>
        <input type="text" class="form-control" name="id" id="id" placeholder="id" value="{{$ad->id}}" hidden>
        <button type="submit" class="btn btn-primary shadow ml-2">Editar</button>
    </form>
@endsection
