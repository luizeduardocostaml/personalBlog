<!DOCTYPE HTML>
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
    <nav class="navbar navbar-light bg-dark">
        <div onclick="showMenu()" class="menu-hamburguer-open">
            <i class="fas fa-bars fa-2x"></i>
        </div>
    </nav>

    <div class="container-fluid m-0 p-0 d-flex">
        <div id="menu" class="menu-hamburguer bg-dark">
            <nav class="navbar navbar-dark bg-dark flex-column">
                <a class="navbar-brand close-mobile" onclick="showMenu()">
                    <i class="fas fa-times"></i>
                </a>
                <ul class="navbar-nav">
                    <div class="dropdown-divider close-mobile"></div>
                    <li class="nav-item text-light">
                        <a href="{{route('admin.panel')}}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item text-light">
                        <a href="{{route('home')}}" class="nav-link">Voltar para o site</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item text-light">
                        Usuário
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Meu Perfil</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item text-light">
                        Gerenciamento
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('news.panel')}}">Notícias</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('post.panel')}}">Blog</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin.userPanel')}}">Usuários</a>
                    </li>
                    <li class="nav-item mb-0">
                        <a class="nav-link" href="{{route('contact.panel')}}">Contato</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('post.panel')}}">Blog</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('admin.userPanel')}}">Usuários</a>
                    </li>
                    <li class="nav-item mb-0">
                        <a class="nav-link" href="{{route('contact.panel')}}">Contato</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item mb-0">
                        <a class="nav-link text-danger" href="{{route('user.logout')}}">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="card m-2">
                <div class="card-header">
                    @yield('title')
                    <div class="float-right">
                        @yield('backButton')
                    </div>
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/main.js')}}" type="text/javascript"></script>

    @yield('javascript')
</body>
</html>
