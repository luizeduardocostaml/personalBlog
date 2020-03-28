<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <script src="https://kit.fontawesome.com/50ccf59978.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <title>@yield('pageTitle')</title>
    </head>
    <body>
        @auth
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#AdminBar" aria-controls="AdminBar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="AdminBar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('admin.panel')}}" class="btn text-light rounded m-1">Painel de administração</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.getChangePassword')}}" class="btn text-light rounded m-1">Mudar senha</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.logout')}}" class="btn text-danger rounded m-1">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        @endauth
        <div class="container pb-3">
            <div class="jumbotron shadow">
                <h1 class="display-4">Luiz Eduardo Costa</h1>
                <p class="lead">Desenvolvedor Web PHP/Laravel</p>
            </div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-laptop-code"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('news')}}">Início <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('blog')}}">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('contact.getRegister')}}">Contato</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="bg-light border rounded-bottom p-3 shadow">
                <div class="container-fluid">
                    <div class="row">@yield('backButton')</div>
                    <h1 class="font-weight-light">@yield('title')</h1>
                </div>
                <div class="dropdown-divider"></div>
                <div class="container-fluid min-vh-100">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="bg-dark position-relative fixed-bottom pb-1">
            <p class="text-white text-center">
                Todos os direitos reservados. <a href="{{route('user.getLogin')}}" class="text-light"><i class="fas fa-copyright"></i></a>
            </p>
        </div>

        <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
        @yield('javascript')
    </body>
</html>
