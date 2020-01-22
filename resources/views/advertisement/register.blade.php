@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Cadastrar Anúncio
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-1">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('registerAd')}}" method="POST" class="m-1" enctype="multipart/form-data">
        @csrf
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="title">Nome</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Anúncio">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="resume">Link</label>
            <input type="text" class="form-control" name="link" id="link" placeholder="Link">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="text">Imagem do Anúncio</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <small class="form-text text-muted">Recomendado uma imagem com 175px de largura.</small>
        </div>
        <button type="submit" class="btn btn-primary shadow ml-2">Cadastrar</button>
    </form>
@endsection
