<?php
if (!isset($_SESSION['id']) or empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
?>

<main>

    <div class="ofertas">
        <h2> Minhas passagens </h2>
        <div class="conteudo">
            <?php
            $query = "SELECT voos.*, passageiros.id as id_passagem, passageiros.poltrona FROM passageiros INNER JOIN voos ON id_voo = voos.id WHERE id_usuario = " . $_SESSION['id'];
            $res = $bd->prepare($query);
            $res->execute();
            if ($res->rowCount() == 0) {
                echo '<h4>Você não possui nenhuma passagem ainda</h4>';
            }
            while ($row = $res->fetch()) {
                echo '
                    <div class="card">
                        <div>
                            <p><i class="bi bi-calendar-event"></i>' . $row['data'] . ' - ' . $row['hora'] . '</p>
                            <p><i class="bi bi-people-fill"></i>' . $row['atual_passageiros'] . '/' . $row['total_passageiros'] . '</p>
                        </div>
                        <div>
                            <p>' . $row['origem'] . '</p>
                            <!-- Seu SVG aqui -->
                            <p>' . $row['destino'] . '</p>
                            <p>R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>
                        </div>
                        <div>
                            <p>Poltrona ' . $row['poltrona'] . '</p>
                        </div>
                        <div>
                            <a class="botaoExcluir" href="./functions/usuario/excluir_passagem.php?id=' . $row['id_passagem'] . '">Excluir Passagem</a>
                        </div>
                    </div>
                ';
            }
            ?>
        </div>
    </div>




</main>