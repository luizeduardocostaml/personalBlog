@extends('layouts.index')

@section('pageTitle')
    Luiz Eduardo Costa - Blog
@endsection

@section('title')
    Contato
@endsection

@section('content')
    <form action="{{route('registrarMensagem')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Endereço de e-mail">
        </div>
        <div class="form-group">
            <label for="title">Assunto</label>
            <input type="text" id="title" name="title"  class="form-control" placeholder="Assunto da mensagem">
        </div>
        <div class="form-group">
            <label for="text">Mensagem</label>
            <textarea name="text" id="text" rows="3" class="form-control" placeholder="Mensagem"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection