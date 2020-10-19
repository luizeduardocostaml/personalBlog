@extends('layouts.admin')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
    <div class="container-fluid row">
        <a href="{{url()->previous()}}" class="btn d-flex align-items-center backButton"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
    </div>
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
    <form action="{{isset($post) ? route('admin.post.update') : route('admin.post.store')}}" method="POST" class="m-1" enctype="multipart/form-data">
        @csrf
        @isset ($post)
            <input type="text" name="id" id="id" value="{{$post->id}}" hidden>
        @endif
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="type">Tipo</label>
            <select class="form-control" name="type" id="type" >
                <option value="notice" {{isset($post) && $post->type == 'notice' ? 'selected' : ''}}>Notícia</option>
                <option value="blog" {{isset($post) && $post->type == 'blog' ? 'selected' : ''}}>Blog</option>
            </select>
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="title">Título</label>
            <input type="text" class="form-control" value="{{$post->title ?? ''}}" name="title" id="title" placeholder="Título do post">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="resume">Resumo</label>
            <input type="text" class="form-control" value="{{$post->resume ?? ''}}" name="resume" id="resume" placeholder="Resumo do texto">
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="text">Texto</label>
            <textarea class="form-control" name="text" id="text" placeholder="Corpo do post" rows="3">{{$post->text ?? ''}}</textarea>
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="text">Imagem do Post</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <small class="form-text text-muted">Recomendado uma imagem com 175px de largura.</small>
        </div>
        <button type="submit" class="btn btn-primary shadow ml-2">Cadastrar</button>
    </form>
@endsection
