<?php
require_once 'init.php';
$PDO=db_connect();
$sql="SELECT id , tipo FROM tipo ORDER BY tipo ASC";
$stmt=$PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Viagens</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/JQuery.js"></script>
        <script src="bootstrap/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" rel="home" href="#">
            <img styles="max-width:100px; margin-top: -7px;" src="">
        </a>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Início <span class="sr-only">(atual)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tarefas</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown10">
                        <a class="dropdown-item" href="form-add.php">Cadastrar Viagem</a>
                        <a class="dropdown-item" href="edicao-da-lista.php">Edição de Viagens</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tipos</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown10">
                    <a class="dropdown-item" href="form-add-tipo.php">Cadastrar Tipo</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    </div>
    <div class="container">
        <p class="h1 text-center">Sistema de Viagens</p>
        <p class="h2 text-center">Cadastro de Viagens</p>

        <form action="add.php" method="post">
        <div class="form-group">
            <label for="name">Cidade: </label>
            <input type="text" class="form-control col-sm" name="name" id="name" style="width:100%;" placeholder="Informe o nome de sua Cidade de destino">
        </div>
        <div class="form-group">
            <label for="UF">UF: </label>
            <input type="text" class="form-control col-sm" name="UF" id="UF" style="width:100%;" placeholder="Informe o nome do seu Estado de destino">
        </div>
        <div class="form-group">
            <label for="ano">Ano: </label>
            <input type="int" class="form-control col-sm" name="ano" id="ano" style="width:100%;" placeholder="Informe o ano da viagem">
        </div>
        <div class="form-group">
            <label for="avaliacao">Avaliação: </label>
            <select class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:100%;">
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
            <option value="6"> 6 </option>
            <option value="7"> 7 </option>
            <option value="8"> 8 </option>
            <option value="9"> 9 </option>
            <option value="10"> 10 </option>
            </select>
        </div>
        <div class ="form-group" >
            <label for="tipo"> Selecione o tipo da tarefa </label>
                <select class ="form-control" name ="tipo" id ="tipo" required >
                <?php while ( $tipo = $stmt -> fetch ( PDO :: FETCH_ASSOC)): ?>
                    <option value =" <?php echo $dados ['id'] ?> "> <?php
                echo $tipo ['tipo'] ?> </option>
                <?php endwhile; ?>
                </select>
        </div>
            <button type="submit" class="btn btn-primary">Cadastrar Viagem</button>
        </form>
    </div>
    </body>
</html>