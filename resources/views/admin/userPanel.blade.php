@extends('layouts.admin')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Gerenciamento dos usuários
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{route('user.getRegister')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo Usuário</a>
    <ul class="list-group shadow rounded ">
        <li class="list-group-item list-group-item-secondary">
            <div class="row justify-content-between">
                <div class="col border-right border-dark">Nome</div>
                <div class="col col-lg-2 border-right border-dark">Cargo</div>
                <div class="col col-lg-2">Ações</div>
            </div>
        </li>
        @foreach($users as $user)
            <li class="list-group-item d-inline">
                <div class="row align-items-center">
                    <div class="col border-right">
                        <p class="text-justify">{{$user->name}}</p>
                    </div>
                    <div class="col col-lg-2 border-right d-flex">
                        <p class="text-justify">Cargo</p>
                    </div>
                    <div class="col col-lg-2 d-flex">
                        <a href="" class="btn btn-danger mr-1" title="Apagar Usuário"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    </div>
@endsection
