<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Origo Teste</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/login.css')}}">
    </head>
    <body class="text-center">
        <div class="form-signin">
        
            <img class="mb-4" src="https://origoenergia.com.br/images/logo-origo.svg" alt="Origo Energia" width="150">
                <div class="message"></div>
            <code>
                <p><strong>Login:<small>adm@email.com</small></strong></p>
                <p><strong>Senha:<small>origoTeste@2020</small><strong></p>
            </code>
            <h1 class="h3 mb-3 font-weight-normal">Informe seus dados!</h1>
            <label for="email" class="sr-only">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="E-mail" required autofocus>
            <label for="password" class="sr-only">Senha</label>
            <input type="password" id="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-success btn-block btn-signin">Entrar</button>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('assets/js/login.js')}}"></script>
</html>
