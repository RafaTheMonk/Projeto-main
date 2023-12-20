<?php

include '../../bd.php';
$bd = connect();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

if (!empty($email) and !empty($email) and !empty($senha)) {

    try {
        $query = "INSERT INTO usuarios (nome, email, senha, admin) VALUES ('$nome','$email','$senha', 1)";
        $res = $bd->prepare($query);
        $res->execute();

        $query = "SELECT id FROM usuarios WHERE email = '$email'";
        $res = $bd->prepare($query);
        $res->execute();

        $row = $res->fetch();

        session_start();
        $_SESSION['id'] = $row['id'];
    } catch (PDOException $er) {
        echo 'Erro: ' . $er->getMessage();
    }
}

header('Location: ../../admin/index.php');
exit();
