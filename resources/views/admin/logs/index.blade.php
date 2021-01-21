@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Gerenciamento do Logs
@endsection

@section('content')
<div class="container-fluid mr-0">
    <ul class="list-group shadow rounded ">
        <li class="list-group-item list-group-item-secondary">
            <div class="row justify-content-between">
                <div class="col-4 col-md-4 border-right border-dark">Usuário</div>
                <div class="col-8 col-md-8 border-right border-dark">Descrição</div>
            </div>
        </li>
        @foreach($logs as $log)
        <li class="list-group-item d-inline">
            <div class="row align-items-center">
                <div class="col-4 col-md-4 border-right">
                    <p class="text-justify">{{$log->user->name}}</p>
                </div>
                <div class="col-8 col-md-8 border-right">
                    <p class="text-justify">{{$log->description}}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection