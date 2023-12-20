<?php
include '../../bd.php';
$bd = connect();
session_start();

if (isset($_GET['id']) && !empty($_GET['id']) && isset($_SESSION['id'])) {
    $idPassagem = $_GET['id'];
    $idUsuario = $_SESSION['id'];

    try {
        // Iniciar transação
        $bd->beginTransaction();

        // Obter o id_voo e verificar se a passagem pertence ao usuário logado
        $query = "SELECT id_voo, id_usuario FROM passageiros WHERE id = :id_passagem";
        $stmt = $bd->prepare($query);
        $stmt->bindValue(':id_passagem', $idPassagem);
        $stmt->execute();
        $resultado = $stmt->fetch();

        if ($resultado && $resultado['id_usuario'] == $idUsuario) {
            $id_voo = $resultado['id_voo'];

            // Excluir passagem
            $query = "DELETE FROM passageiros WHERE id = :id_passagem";
            $stmt = $bd->prepare($query);
            $stmt->bindValue(':id_passagem', $idPassagem);
            $stmt->execute();

            // Reduzir o número de passageiros no voo
            $query = "UPDATE voos SET atual_passageiros = atual_passageiros - 1 WHERE id = :id_voo";
            $stmt = $bd->prepare($query);
            $stmt->bindValue(':id_voo', $id_voo);
            $stmt->execute();

            // Confirmar transação
            $bd->commit();

            // Redirecionar para a página anterior com mensagem de sucesso
            $_SESSION['mensagem'] = 'Passagem excluída com sucesso.';
            $urlRetorno = $_SERVER['HTTP_REFERER'] ?? 'usuario.php';
            header('Location: ' . $urlRetorno);
        } else {
            echo 'Operação não autorizada.';
        }
    } catch (PDOException $er) {
        $bd->rollBack();
        echo 'Erro: ' . $er->getMessage();
    }
} else {
    echo 'Parâmetros inválidos.';
}
exit();
