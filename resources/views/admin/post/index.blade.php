@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Gerenciamento do Blog
@endsection

@section('content')
<div class="container-fluid mr-0">
    <ul class="list-group shadow rounded mb-2 mt-2">
        <li class="list-group-item list-group-item-light">
            <form action="{{ route('admin.post.index') }}">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="code">Código</label>
                            <input type="text" class="form-control" id="code" name="code"  value="{{ $query->code ?? '' }}" placeholder="Código">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $query->title ?? '' }}" placeholder="Título">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="date_from">A partir de</label>
                            <input type="date" class="form-control" id="date_from" name="date_from"  value="{{ $query->date_from ?? '' }}" placeholder="Título">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="date_to">Até </label>
                            <input type="date" class="form-control" id="date_to" name="date_to" value="{{ $query->date_to ?? '' }}" placeholder="Título">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select id="type" name="type" class="form-control">
                                <option {{  $query->type ?? '' == '' ? 'selected' : ''}} value="">-</option>
                                <option {{ $query->type ?? '' == 'blog' ? 'selected' : ''}} value="blog">Blog</option>
                                <option {{ $query->type ?? '' == 'notice' ? 'selected' : ''}} value="notice">Notícia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="author">Autor</label>
                            <input type="text" class="form-control" id="author" name="author"  value="{{ $query->author ?? '' }}" placeholder="Título">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-end">
                        <button type="submit" class="btn btn-primary float-right">Buscar</button>
                    </div>
                </div>
            </form>
        </li>
    </ul>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo
        Post</a>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <caption>Lista de posts</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Título</th>
                    <th scope="col">Resumo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th>{{$post->id}}</th>
                    <th>{{$post->tipo}}</th>
                    <th>{{$post->author->name}}</th>
                    <th>{{$post->title}}</th>
                    <th>{{$post->resume}}</th>
                    <th>
                        <a href="{{route('admin.post.destroy', ['id' => $post->id])}}" class="btn btn-danger mr-1 mb-1 wh-40"
                            title="Apagar Post"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{route('admin.post.edit', ['id' => $post->id])}}" class="btn btn-primary mr-1 mb-1 wh-40"
                            title="Editar Post"><i class="fas fa-edit"></i></a>
                        <a href="{{route('post.show', ['slug' => $post->slug])}}"
                            class="btn btn-primary wh-40" title="Visualizar Post"><i class="fas fa-eye"></i></a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-auto">{{ $posts->links() }}</div>
    </div>
</div>

@endsection