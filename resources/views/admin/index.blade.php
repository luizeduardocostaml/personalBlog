@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Painel de administração
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-center mb-2 " style="height: 90%;">
            <div class="card-header bg-dark text-light">
                Posts
            </div>
            <div class="card-body d-flex justify-content-center flex-column">
                <h5 class="card-title">Gerenciamento dos posts</h5>
                <p class="card-text">Criar, editar, e apagar posts.</p>
                <a href="{{route('admin.post.index')}}" class="btn btn-primary mt-auto">Acessar</a>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-center mb-2" style="height: 90%;">
            <div class="card-header bg-dark text-light">
                Contato
            </div>
            <div class="card-body d-flex justify-content-center flex-column">
                <h5 class="card-title">Gerenciamento de Contato</h5>
                <p class="card-text">Criar, editar, e apagar mensagens.</p>
                <a href="{{route('admin.contact.index')}}" class="btn btn-primary mt-auto">Acessar</a>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6 col-lg-3">
        <div class="card text-center mb-2" style="height: 90%;">
            <div class="card-header bg-dark text-light">
                Usuários
            </div>
            <div class="card-body d-flex justify-content-center flex-column">
                <h5 class="card-title">Gerenciamento de Usuários</h5>
                <p class="card-text">Criar e apagar usuários.</p>
                <a href="{{route('admin.user.index')}}" class="btn btn-primary mt-auto">Acessar</a>
            </div>
        </div>
    </div>
</div>
@endsection