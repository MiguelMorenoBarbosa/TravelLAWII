<?php
require_once 'init.php';
//abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
//A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
//É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM TravelLAWII";
//SQL para selecionar os registros
$sql = "SELECT id, name, UF, ano, avaliacao FROM TravelLAWII";
//conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    <!-- Custom styles for this template -->
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
                        <a class="dropdown-item" href="lista.php">Lista de Viagens</a>
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
            <br>
            <p class="h2 text-center">Lista de Viagens</p>
            <p>Total de viagens: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" width="50%" border="1">
                <thead>
                    <tr>
                        <th>Cidade de destino</th>
                        <th>UF</th>
                        <th>Ano</th>
                        <th>Avaliação: 0 a 10</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($viagens = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $viagens['name'] ?></td>
                        <td><?php echo $viagens['UF'] ?></td>
                        <td><?php echo $viagens['ano'] ?></td>
                        <td><?php echo $viagens['avaliacao'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhuma viagem registrada</p>
            <?php endif; ?>
        </div>
    </body>
</html>