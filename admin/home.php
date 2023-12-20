<?php
if (!isset($_SESSION['id']) or empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
?>

<main>
    <section class="todas" id="todas">
        <h2>Todos os voos</h2>
        <div class="conteudo">
            <table>
                <tr>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Valor</th>
                    <th>Data e Hora</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <?php
                $query = "SELECT * FROM voos ORDER BY data ASC";
                $res = $bd->prepare($query);
                $res->execute();
                while ($row = $res->fetch()) {
                    echo '
                        <tr>
                            <td>' . $row['origem'] . '</td>
                            <td>' . $row['destino'] . '</td>
                            <td>' . $row['preco'] . '</td>
                            <td>' . $row['data'] . ' - ' . $row['hora'] . '</td>
                            <td>
                                <a class="botao preto" href="./index.php?pg=editar-voo&id=' . $row['id'] . '">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                            </td>
                            <td>
                                <a class="botao preto" href="../functions/voos/excluir.php?id=' . $row['id'] . '">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </td>
                        </tr>
                        
                        ';
                }
                ?>
            </table>
        </div>
    </section>
</main>