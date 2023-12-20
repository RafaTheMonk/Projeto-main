<main>
    <section class="login">
        <h2>Novo voo</h2>

        <form action="../functions/voos/cadastrar.php" method="POST">
            <div>
                <p>Origem</p>
                <input class="input branco" list="origens" name="origem" required>

                <datalist id="origens">
                    <option value="Porto Alegre">
                    <option value="Rio de Janeiro">
                    <option value="São Paulo">
                    <option value="Salvador">
                </datalist>
            </div>
            <div>
                <p>Destino</p>
                <input class="input branco" list="destinos" name="destino" required>

                <datalist id="destinos">
                    <option value="Porto Alegre">
                    <option value="Rio de Janeiro">
                    <option value="São Paulo">
                    <option value="Salvador">
                </datalist>
            </div>
            <div>
                <p>Data</p>
                <input type="date" name="data" class="input branco" required>
            </div>
            <div>
                <p>Hora</p>
                <input type="time" name="hora" class="input branco" required>
            </div>
            <div>
                <p>Máximo de passageiros</p>
                <input type="number" min="1" name="total_passageiros" class="input branco" required>
            </div>

            <div>
                <p>Preço do Voo</p>
                <input type="number" step="0.01" min="0" name="preco" class="input branco" required>
            </div>

            <h5>
                <input type="submit" value="Salvar" class="botao azul">
            </h5>
        </form>

    </section>
</main>