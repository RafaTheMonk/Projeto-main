<?php

include '../../bd.php';
$bd = connect();

$email = $_POST['email'];
$senha = md5($_POST['senha']);

if (!empty($email) and !empty($email) and !empty($senha)) {

    try {
        $query = "SELECT * from usuarios WHERE email = :email AND senha = :senha";
        $res = $bd->prepare($query);
        $valores = array(
            'email' => $email,
            'senha' => $senha
        );
        $res->execute($valores);

        if ($res->rowCount() > 0) {
            $row = $res->fetch();
            session_start();
            $_SESSION['id'] = $row['id'];
        }
    } catch (PDOException $er) {
        echo 'Erro: ' . $er->getMessage();
    }
}

header('Location: ../../index.php');
exit();
