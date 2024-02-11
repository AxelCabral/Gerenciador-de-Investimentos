<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/fonts.css" rel="stylesheet" />
    <link rel="icon" href="img/logo.png">
    <script src="js/lord-icon.js"></script>
    <title>Novo Aporte</title>
</head>
<body>
    <header>
        <div class="return">
            <a href="index.php" title="Voltar" target="_self" rel="prev">
                <lord-icon src="css/icons/return.json"
                    trigger="hover"
                    delay="1000"
                    colors="primary:#000,secondary:#ffffff"
                    style="width:30px;height:auto;padding-bottom:10px;padding-left:5px;">
                </lord-icon>
            </a>
        </div>
        <div class="title-form">
            <div class="main-text-title">
                <h1>Novo Aporte de Investimento</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out-form">
            <div class="form-style">
                <form action="pdo/confirmar_investimento.php" method="post">
                    <label for="valor">Valor: R$</label>
                    <input type="number" step=".02" name="valor" required>

                    <input type="submit" value="Confirmar">
                </form>
            </div>
        </section>
    </main>
    <footer>
        <p id="footer-text">Controle de Investimentos by <strong>Axel Cabral</strong> 
        <lord-icon src="css/icons/iota.json"
        trigger="loop"
        delay="1000"
        colors="primary:#ffffff,secondary:#ffffff"
        style="width:25px;height:auto;padding-bottom:10px;">
        </lord-icon>
        │ &copy; Todos os direitos reservados.</p>
    </footer>
</body>
</html>