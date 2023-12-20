<?php
//se a pessoa não ta logada ou não tem o id do voo, volta pro index
if (!isset($_GET['id']) or empty($_GET['id']) or !isset($_SESSION['id']) or empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

$query = "SELECT * FROM voos WHERE id=" . $_GET['id'];
$res = $bd->prepare($query);
$res->execute();
$row = $res->fetch();

?>


<main>
    <section class="login">
        <h2>Novo voo</h2>

        <form action="../functions/voos/editar.php" method="POST">
            <input value="<?php echo $row['id'] ?>" type="hidden" name="id">
            <div>
                <p>Origem</p>
                <input value="<?php echo $row['origem'] ?>" class="input branco" list="origens" name="origem" required>

                <datalist id="origens">
                    <option value="Porto Alegre">
                    <option value="Rio de Janeiro">
                    <option value="São Paulo">
                    <option value="Salvador">
                </datalist>
            </div>
            <div>
                <p>Destino</p>
                <input value="<?php echo $row['destino'] ?>" class="input branco" list="destinos" name="destino" required>

                <datalist id="destinos">
                    <option value="Porto Alegre">
                    <option value="Rio de Janeiro">
                    <option value="São Paulo">
                    <option value="Salvador">
                </datalist>
            </div>
            <div>
                <p>Data</p>
                <input value="<?php echo $row['data'] ?>" type="date" name="data" class="input branco" required>
            </div>
            <div>
                <p>Hora</p>
                <input value="<?php echo $row['hora'] ?>" type="time" name="hora" class="input branco" required>
            </div>
            <div>
                <p>Máximo de passageiros</p>
                <input value="<?php echo $row['total_passageiros'] ?>" type="number" min="1" name="total_passageiros" class="input branco" required>
            </div>
            <div>
                <p>Valor</p>
                <input value="<?php echo $row['preco'] ?>" type="number" name="preco" class="input branco" required>
            </div>

            <h5>
                <input type="submit" value="Salvar" class="botao azul">
            </h5>
        </form>

    </section>
</main>