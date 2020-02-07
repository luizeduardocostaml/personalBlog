@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('backButton')
    <div class="container-fluid row">
        <a href="{{route('admin.panel')}}" class="btn backButton"><i class="fas fa-angle-left mr-1"></i>Voltar</a>
    </div>
@endsection

@section('title')
    Painel de Anúncios
@endsection

@section('content')
    <div class="container-fluid mr-0">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{route('ad.getRegister')}}" class="btn btn-primary mb-2 shadow"><i class="fas fa-plus mr-1"></i>Novo Anúncio</a>
        <ul class="list-group shadow rounded ">
            <li class="list-group-item list-group-item-secondary">
                <div class="row justify-content-between">
                    <div class="col border-right border-dark">Nome</div>
                    <div class="col col-lg-2 border-right border-dark">Posição</div>
                    <div class="col col-lg-2">Ações</div>
                </div>
            </li>
            @foreach($ads as $ad)
                <li class="list-group-item d-inline">
                    <div class="row align-items-center">
                        <div class="col border-right">
                            <p class="text-justify">{{$ad->name}}</p>
                        </div>
                        <div class="col col-lg-2 border-right d-flex">
                            @if($ad->position > 1)
                                <a href="{{route('ad.upPosition', ['id' => $ad->id])}}"><i class="fas fa-arrow-up m-1"></i></a>
                            @else
                                <div style="width:20px; height: 20px;"></div>
                            @endif
                            <p class="text-justify">{{$ad->position}}</p>
                            @if(!($ad->position == $count))
                                <a href="{{route('ad.downPosition', ['id' => $ad->id])}}"><i class="fas fa-arrow-down m-1"></i></a>
                            @else
                                <div style="width:20px; height: 20px;"></div>
                            @endif
                        </div>
                        <div class="col col-lg-2 d-flex">
                            <a href="{{route('ad.delete', ['id' => $ad->id])}}" class="btn btn-danger mr-1" title="Apagar Anúncio"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{route('ad.getEdit', ['id' => $ad->id])}}" class="btn btn-primary mr-1 pr-2" title="Editar Anúncio"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
