<?php
require 'init.php';
//pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id))
{
    echo "Id para alteração não definido";
    exit;
}
// busc os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, UF, ano, avaliacao, tipo FROM TravelLAWII WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$TravelLAWII = $stmt->fetch(PDO::FETCH_ASSOC);
// Se o método fetch() não retornar um array, significa que o ID não corresponde que o ID não corresponde a um usuário válido
if (!is_array($TravelLAWII))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Viagens</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootsrap.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
    <div class="container">
        <h1>Sistema de Viagens</h1>
        <h2>Cadastro de Viagens</h2><br />
        <form action="edit.php" method="post">
        <div class="form-group">
            <label for="name">Cidade: </label>
            <input type="text" class="form-control col-sm" name="name" id="name" style="width:25%;" value="<?php echo $TravelLAWII['name'] ?>">
        </div>
        <div class="form-group">
            <label for="UF">UF: </label>
            <input type="text" class="form-control col-sm" name="UF" id="UF" style="width:25%;" value="<?php echo $TravelLAWII['UF'] ?>">
        </div>
        <div class="form-group">
            <label for="ano">Ano: </label>
            <input type="int" class="form-control col-sm" name="ano" id="ano" style="width:25%;" value="<?php echo $TravelLAWII['ano'] ?>">
        </div>
        <div class="form-group">
            <label for="avaliacao">Avaliação: </label>
            <select class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:25%;" value="<?php echo $TravelLAWII['avaliacao'] ?>">
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
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
    </body>
</html>