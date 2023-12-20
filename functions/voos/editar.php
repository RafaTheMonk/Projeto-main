<?php

include '../../bd.php';
$bd = connect();

$valores = array(
    'id' =>  $_POST['id'],
    'origem' =>  $_POST['origem'],
    'destino' => $_POST['destino'],
    'preco' => $_POST['preco'],
    'data' =>    $_POST['data'],
    'hora' =>    $_POST['hora'],
    'total_passageiros' => $_POST['total_passageiros']
);

if (!empty($_POST['id']) and !empty($_POST['origem']) and !empty($_POST['destino']) and !empty($_POST['preco']) and !empty($_POST['data']) and !empty($_POST['hora']) and !empty($_POST['total_passageiros'])) {

    try {
        $query = "UPDATE voos SET origem = :origem, destino = :destino, preco = :preco, data = :data, hora = :hora, total_passageiros = :total_passageiros WHERE id = :id";
        $res = $bd->prepare($query);
        $res->execute($valores);
    } catch (PDOException $er) {
        echo 'Erro: ' . $er->getMessage();
    }
}

header('Location: ../../admin/index.php');
exit();
