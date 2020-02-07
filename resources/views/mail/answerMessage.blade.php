<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Resposta</title>
</head>
<body>
    <div>
        <h1>Resposta da sua mensagem</h1>
        <p >Obrigado por nos enviar sua mensagem! Abaixo está os detalhes da sua mensagem.</p>
        <hr>
        <div style="border-style: solid; margin: 1%; padding: 1%;">
            <h2>Pergunta</h2>
            <h3>Autor</h3>
            <p>{{$question->name}}</p>
            <h3>E-mail</h3>
            <p>{{$question->email}}</p>
            <h3>Título</h3>
            <p>{{$question->title}}</p>
            <h3>Mensagem</h3>
            <p>{{$question->text}}</p>
        </div>
        <div style="border-style: solid; margin: 1%; padding: 1%;">
            <h2>Resposta</h2>
            <p>{{$answer}}</p>
        </div>
    </div>
</body>
</html>
