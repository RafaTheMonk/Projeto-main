<?php

include '../../bd.php';
$bd = connect();

$valores = array(
    'origem' =>  $_POST['origem'],
    'destino' => $_POST['destino'],
    'preco' => $_POST['preco'],
    'data' =>    $_POST['data'],
    'hora' =>    $_POST['hora'],
    'atual_passageiros' => 0,
    'total_passageiros' => $_POST['total_passageiros']
);

if (!empty($_POST['origem']) and !empty($_POST['destino']) and !empty($_POST['preco']) and !empty($_POST['data']) and !empty($_POST['total_passageiros'])) {

    try {
        $query = "INSERT INTO voos (origem, destino, preco, data, hora, atual_passageiros, total_passageiros) VALUES (:origem, :destino, :preco, :data, :hora, :atual_passageiros, :total_passageiros)";
        $res = $bd->prepare($query);
        $res->execute($valores);
    } catch (PDOException $er) {
        echo 'Erro: ' . $er->getMessage();
    }
}

header('Location: ../../admin/index.php');
exit();
