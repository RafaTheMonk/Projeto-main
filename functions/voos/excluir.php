<?php

    include '../../bd.php';
    $bd = connect();

    if( isset($_GET['id']) and !empty($_GET['id']) ){

        try {
            $query = "DELETE FROM voos WHERE id=".$_GET['id'];
            $res = $bd->prepare($query);
            $res->execute();

        } catch (PDOException $er){
            echo 'Erro: '.$er->getMessage();
        }
    } 
    
    header('Location: ../../admin/index.php');
    exit();

?>

