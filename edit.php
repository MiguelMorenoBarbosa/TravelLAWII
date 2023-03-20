<?php
require_once 'init.php';
//pega os dados do formulario
$name = isset($_POST['name']) ? $_POST['name'] : null;
$UF = isset($_POST['UF']) ? $_POST['UF'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$avaliacao = isset($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
//Validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($UF) || empty($ano) || empty($avaliacao))
{
    echo "Volte e preencha todos os campos";
    exit;
}
if ($avaliacao > 10 || $avaliacao < 0)
{
    echo "Avaliação é feita de 0 a 10";
    exit;
}
//insere no Banco
$PDO = db_connect();
$sql = "INSERT INTO users(name, UF, ano, avaliacao) VALUES(:name, :UF, :ano, :avaliacao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':UF', $UF);
$stmt->bindParam(':ano', $ano);
$stmt->bindParam(':avaliacao', $avaliacao);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt-> execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->erroInfo());
}
?>








