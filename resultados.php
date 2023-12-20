<?php
if (!isset($_SESSION['id']) or empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

if (empty($_GET['origem']) and empty($_GET['destino'])) {
    header('Location: index.php#consultar');
    exit;
}
?>

<main>

    <div class="ofertas">
        <h2> Resultados </h2>
        <div class="conteudo">

            <?php
            $origem = $_GET['origem'];
            $destino = $_GET['destino'];

            //se tem ambos
            if (!empty($origem) and !empty($destino)) {
                $query = "SELECT * FROM voos WHERE origem = '" . $origem . "' AND destino = '" . $destino . "'";
                //se não tem origem, apenas destino
            } else if (empty($origem) and !empty($destino)) {
                $query = "SELECT * FROM voos WHERE destino = '" . $destino . "'";
                //se tem origem, e não tem destino
            } else if (!empty($origem) and empty($destino)) {
                $query = "SELECT * FROM voos WHERE origem = '" . $origem . "'";
            }
            $res = $bd->prepare($query);
            $res->execute();
            if ($res->rowCount() == 0) {
                echo '<h4> Sem resultados para essa pesquisa</h4>';
            }
            while ($row = $res->fetch()) {
                echo '

                            <div class="card">
                                <div>
                                    <p>
                                        <i class="bi bi-calendar-event"></i>
                                        ' . $row['data'] . ' - ' . $row['hora'] . '
                                    </p>
                                    <p>
                                        <i class="bi bi-people-fill"></i>
                                        ' . $row['atual_passageiros'] . '/' . $row['total_passageiros'] . '
                                    </p>
                                </div>
                                <div>
                                    <p>' . $row['origem'] . '</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M6.05 42v-3h36v3ZM9.2 31.6l-5.15-8.75 2.15-.4 3.5 3.1L21 22.5 12.45 8.15l2.9-.85L29.6 20.15l10.8-2.9q1.35-.4 2.45.475t1.1 2.325q0 .95-.575 1.7t-1.475 1Z"/></svg>
                                    <p>' . $row['destino'] . '</p>
                                    <p>R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>
                                </div>
                        
                                <div>
                                    <a href="functions/usuario/comprar.php?id=' . $row['id'] . '" class="botao azul">
                                        Comprar
                                        <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </div>
                            </div>
                        
                    ';
            }
            ?>

        </div>
    </div>

</main>