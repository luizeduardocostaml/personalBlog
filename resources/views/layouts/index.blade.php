<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/50ccf59978.js" crossorigin="anonymous"></script>
    <title>@yield('pageTitle')</title>
</head>
<body>
    @auth
        <div class="container bg-dark">
            <div class="row">
                <div class="col-7">
                    <a href="{{route('admin.panel')}}" class="btn text-light rounded m-1">Painel de administração</a>
                </div>
                <div class="col-2">
                    <a href="{{route('admin.getChangePassword')}}" class="btn text-light rounded m-1">Mudar senha</a>
                </div>
                <div class="col-3">
                    <a href="{{route('admin.logout')}}" class="btn text-danger rounded m-1">Logout</a>
                </div>
            </div>
        </div>
    @endauth
    <div class="container mb-5 pb-3">
        <div class="jumbotron shadow">
            <h1 class="display-4">Luiz Eduardo Costa</h1>
            <p class="lead">Desenvolvedor Web PHP/Laravel</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code"></i>
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('home')}}">Início <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('home')}}">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('contact.getRegister')}}">Contato</a>
                </li>
            </ul>
        </nav>
        <div class="bg-light border rounded-bottom p-3 shadow">
            <div class="container-fluid">
                <h1 class="font-weight-light">@yield('title')</h1>
            </div>
            <div class="dropdown-divider"></div>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="bg-dark p-1 position-fixed fixed-bottom">
        <p class="text-white text-center">
            Todos os direitos reservados. <a href="{{route('admin.getLogin')}}" class="text-light"><i class="fas fa-copyright"></i></a>
        </p>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
