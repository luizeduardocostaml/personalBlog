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
        <div class="card text-center m-2">
            <div class="card-header bg-dark text-light">
                Blog
            </div>
            <div class="card-body">
                <h5 class="card-title">Gerenciamento do Blog</h5>
                <p class="card-text">Criar, editar, e apagar posts.</p>
                <a href="{{route('post.panel')}}" class="btn btn-primary">Acessar</a>
            </div>
        </div>

        <div class="card text-center m-2">
            <div class="card-header bg-dark text-light">
                Anúncios
            </div>
            <div class="card-body">
                <h5 class="card-title">Gerenciamento de Anúncios</h5>
                <p class="card-text">Criar, editar, e apagar anúncios.</p>
                <a href="{{route('ad.panel')}}" class="btn btn-primary">Acessar</a>
            </div>
        </div>

        <div class="card text-center m-2">
            <div class="card-header bg-dark text-light">
                Contato
            </div>
            <div class="card-body">
                <h5 class="card-title">Gerenciamento de Contato</h5>
                <p class="card-text">Criar, editar, e apagar mensagens.</p>
                <a href="{{route('contact.panel')}}" class="btn btn-primary">Acessar</a>
            </div>
        </div>

        <div class="card text-center m-2">
            <div class="card-header bg-dark text-light">
                Usuários
            </div>
            <div class="card-body">
                <h5 class="card-title">Gerenciamento de Usuários</h5>
                <p class="card-text">Criar e apagar usuários.</p>
                <a href="{{route('contact.panel')}}" class="btn btn-primary">Acessar</a>
            </div>
        </div>
    </div>
@endsection
