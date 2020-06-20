@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Gerenciamento dos usuários
@endsection

@section('content')
<div class="container-fluid mr-0">
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
    <a href="{{route('user.getRegister')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo
        Usuário</a>
    <ul class="list-group shadow rounded ">
        <li class="list-group-item list-group-item-secondary">
            <div class="row justify-content-between">
                <div class="col-6 col-md-6 border-right border-dark">Nome</div>
                <div class="col-3 col-md-3 border-right border-dark">Cargo</div>
                <div class="col-3 col-md-3">Ações</div>
            </div>
        </li>
        @foreach($users as $user)
        <li class="list-group-item d-inline">
            <div class="row align-items-center">
                <div class="col-6 col-md-6 border-right">
                    <p class="text-justify">{{$user->name}}</p>
                </div>
                <div class="col-3 col-md-3 border-right">
                    <p class="text-justify">{{$user->hole}}</p>
                </div>
                <div class="col-3 col-md-3 d-flex flex-wrap">
                    <a href="{{route('user.destroy', ['id' => $user->id])}}" class="btn btn-danger wh-40"
                        title="Apagar Usuário"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection