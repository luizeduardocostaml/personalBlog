@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Painel de Anúncios
@endsection

@section('content')
    <div class="container-fluid mr-0">
        <a href="{{route('registerAd')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo Anúncio</a>
        <ul class="list-group shadow rounded ">
            <li class="list-group-item list-group-item-secondary">
                <div class="row justify-content-between">
                    <div class="col border-right border-dark">Nome</div>
                    <div class="col col-sm-7 border-right border-dark">Posição</div>
                    <div class="col col-lg-2">Ações</div>
                </div>
            </li>
            @foreach($ads as $ad)
                <li class="list-group-item d-inline">
                    <div class="row align-items-center">
                        <div class="col border-right">
                            <p class="text-justify">{{$ad->name}}</p>
                        </div>
                        <div class="col col-sm-7 border-right">
                            <p class="text-justify">{{$ad->position}}</p>
                        </div>
                        <div class="col col-lg-2 d-flex">
                            <a href="" class="btn btn-danger mr-1" title="Apagar Anúncio"><i class="fas fa-trash-alt"></i></a>
                            <a href="" class="btn btn-primary mr-1 pr-2" title="Editar Anúncio"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
