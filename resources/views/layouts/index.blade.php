<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/50ccf59978.js" crossorigin="anonymous"></script>
    <title>@yield('pageTitle')</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Luiz Eduardo Costa</h1>
            <p class="lead">Desenvolvedor Web PHP/Laravel</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code"></i>
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Contato</a>
                </li>
            </ul>
        </nav>
        <div>
            <h1 class="m-2">@yield('title')</h1>
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="bg-dark p-1 fixed-bottom"><p class="text-white text-center">Todos os direitos reservados.</p></div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>