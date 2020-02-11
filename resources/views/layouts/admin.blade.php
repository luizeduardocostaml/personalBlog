<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/50ccf59978.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <title>@yield('pageTitle')</title>
    </head>
    <body>
        <div class="row min-vh-100 vw-100">
            <div class="col-sm-2 bg-dark">
                <nav class="navbar navbar-dark flex-column ">
                    <a class="navbar-brand" href="#">
                        <i class="fas fa-laptop-code"></i>
                    </a>
                    <ul class="navbar-nav w-100">
                        <div class="dropdown-divider"></div>
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
                            <a class="nav-link" href="{{route('home')}}">Meu Perfil</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item text-light">
                            Gerenciamento
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('post.panel')}}">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.userPanel')}}">Usuários</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('ad.panel')}}">Anúncios</a>
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
            <div class="col-sm-10">
                @yield('backButton')
                <div class="card mt-3 mb-1">
                    <div class="card-header">
                        @yield('title')
                    </div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
    </body>
</html>
