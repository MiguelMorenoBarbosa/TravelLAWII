<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Viagens</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootsrap.js"></script>
    </head>
    <body>
    <div class="container">
        <h1>Sistema de Viagens</h1>
        <h2>Cadastro de Viagens</h2>

        <form action="add.php" method="post">
        <div class="form-group">
            <label for="name">Cidade: </label>
            <input type="text" class="form-control col-sm" name="name" id="name" style="width:25%;" placeholder="Informe o nome de sua Cidade de destino">
        </div>
        <div class="form-group">
            <label for="UF">UF: </label>
            <input type="text" class="form-control col-sm" name="UF" id="UF" style="width:25%;" placeholder="Informe o nome do seu Estado de destino">
        </div>
        <div class="form-group">
            <label for="ano">Ano: </label>
            <input type="int" class="form-control col-sm" name="ano" id="ano" style="width:25%;" placeholder="Informe o ano da viagem">
        </div>
        <div class="form-group">
            <label for="avaliacao">Avaliação: </label>
            <input type="int" class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:25%;" placeholder="Informe a sua avaliação da viagem">
        </div>
            <button type="submit" class="btn btn-primary">Cadastrar Viagem</button>
        </form>
    </div>
    </body>
</html>