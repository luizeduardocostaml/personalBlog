@extends('layouts.admin')

@section('pageTitle')
Luiz Eduardo Costa - Blog
@endsection

@section('title')
Editar perfil
<a href="{{route('user.show', ['slug' => $user->slug])}}" class="btn btn-info float-right">Ver perfil</a>
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
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger m-1">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('admin.user.update')}}" method="POST" class="m-1" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-3 mb-2">
                <img src="{{$user->image}}" class="img-fluid img-thumbnail" id="previewImage" alt="Responsive image">
                <input type="hidden" value="{{$user->image}}" id="defaultImage">
                <div class="custom-file mt-1">
                    <input type="file" id="image" class="custom-file-input" name="image">
                    <label class="custom-file-label" for="image">Selecione a foto</label>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="form-group">
                    <label for="password">Nome</label>
                    <input type="text" class="form-control shadow" placeholder="Nome" name="name" id="name"
                        value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="text">Biografia</label>
                    <textarea name="biography" id="biography" rows="3" class="form-control shadow"
                        placeholder="Biogafia">{{$user->biography}}</textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection

@section('javascript')
<script>
    $("#image").change(function(){
        let def = $("#defaultImage").val();
        imagePreview(this, "#previewImage", def);
    });
</script>
@endsection