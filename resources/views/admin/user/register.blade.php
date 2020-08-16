@extends('layouts.admin')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Criar Usuário
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-1">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('user.register')}}" method="POST" class="m-1" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" placeholder="Senha" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password">Email</label>
            <input type="email" class="form-control" placeholder="E-mail" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Nome</label>
            <input type="text" class="form-control" placeholder="Nome" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="hole">Cargo</label>
            <select class="form-control" name="role" id="role" >
                <option value="admin" selected>Admin</option>
                <option value="editor">Editor</option>
            </select>
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="text">Biografia</label>
            <textarea name="biography" id="biography" rows="3" class="form-control" placeholder="Biogafia"></textarea>
        </div>
        <div class="form-group bg-light p-3 border border-dark rounded shadow">
            <label for="text">Foto</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <small class="form-text text-muted">Recomendado uma foto de perfil.</small>
        </div>
        <button type="submit" class="btn btn-primary ">Registrar</button>
    </form>
@endsection
