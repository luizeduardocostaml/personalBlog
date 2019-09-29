@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Painel de administração
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Posts</h5>
                    <p class="card-text">Gerenciar os posts e nóticias</p>
                    <a href="{{route('painelBlog')}}" class="btn btn-primary">Administrar Posts</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Mensagens</h5>
                    <p class="card-text">Gerenciar as mensagens de contato</p>
                    <a href="{{route('painelContato')}}" class="btn btn-primary">Administrar Contato</a>
                </div>
            </div>
        </div>
    </div>
@endsection