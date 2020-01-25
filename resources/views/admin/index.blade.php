@extends('layouts.index')

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
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Posts</h5>
                    <p class="card-text">Gerenciar os posts e nóticias</p>
                    <a href="{{route('post.panel')}}" class="btn btn-primary">Administrar Posts</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Mensagens</h5>
                    <p class="card-text">Gerenciar as mensagens de contato</p>
                    <a href="{{route('contact.panel')}}" class="btn btn-primary">Administrar Contato</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Anúncios</h5>
                    <p class="card-text">Gerenciar os anúncios da página</p>
                    <a href="{{route('ad.panel')}}" class="btn btn-primary">Administrar Anúncios</a>
                </div>
            </div>
        </div>
    </div>
@endsection
