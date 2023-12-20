<?php

include '../../bd.php';
$bd = connect();
session_start();

if (!empty($_GET['id'])  and !empty($_SESSION['id'])) {

    try {
        // Pegar número atual de passageiros e o máximo
        $query = "SELECT atual_passageiros, total_passageiros FROM voos WHERE id=" . $_GET['id'];
        $res = $bd->prepare($query);
        $res->execute();
        $row = $res->fetch();
        $atual = $row['atual_passageiros'];
        $total = $row['total_passageiros'];

        // Se atual < maximo
        if ($atual < $total) {
            $atual++;
            // Update voo com tal id para atual + 1
            $query = 'UPDATE voos SET atual_passageiros=' . $atual . ' WHERE id=' . $_GET['id'];
            $res = $bd->prepare($query);
            $res->execute();

            // Calcular desconto com base na ordem da passagem
            $desconto = 0;
            if ($atual <= 10) {
                $desconto = 25;
            } else if ($atual <= 20) {
                $desconto = 15;
            } else if ($atual <= 30) {
                $desconto = 5;
            }

            // Inserir em passageiros ambos ids com desconto
            $query = 'INSERT INTO passageiros (id_voo, id_usuario, poltrona, desconto) VALUES (' . $_GET['id'] . ',' . $_SESSION['id'] . ',' . $atual . ', ' . $desconto . ')';
            $res = $bd->prepare($query);
            $res->execute();
        }
    } catch (PDOException $er) {
        echo 'Erro: ' . $er->getMessage();
    }
}

header('Location: ../../index.php?pg=usuario');
exit();
