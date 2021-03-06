<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="https://kit.fontawesome.com/50ccf59978.js" crossorigin="anonymous"></script>
    <title>Registrar</title>
</head>
<body class="bg-dark">
    <div class="container mt-5 mb-5 register-card h-25 border border-primary bg-light shadow rounded">
        <div class="card border-0">
            <div class="card-header">
                <h3 class="text-center ">Registrar</h3>
            </div>
            <div class="card-body bg-light">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger m-1">{{$error}}</div>
                    @endforeach
                @endif
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="password">Email</label>
                        <input type="email" class="form-control" placeholder="E-mail" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" placeholder="Senha" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password">Nome</label>
                        <input type="text" class="form-control" placeholder="Nome" name="name" id="name">
                    </div>
                    <input type="text" class="form-control" name="role" id="role" value="admin" hidden>
                    <div class="form-group bg-light p-3 border border-dark rounded shadow">
                        <label for="text">Biografia</label>
                        <textarea name="biography" id="biography" rows="3" class="form-control" placeholder="Biogafia"></textarea>
                    </div>
                    <div class="form-group bg-light p-3 border border-dark rounded shadow">
                        <label for="text">Foto</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <small class="form-text text-muted">Recomendado uma foto de perfil.</small>
                    </div>
                    <button type="submit" class="btn btn-primary ">Registrar</button>
                </form>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
