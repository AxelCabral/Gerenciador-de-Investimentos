<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/fonts.css" rel="stylesheet" />
    <link rel="icon" href="img/logo.png">
    <script src="js/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/lord-icon.js"></script>
    <title>Novo Investimento</title>
</head>
<body class="list-main-section-form">
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
                <h1>Novo Investimento</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out-form">
            <div class="form-style">
                <label for="tipo">Tipo de Investimento</label>
                <select id="form-select" name="tipo-de-investimento" required>
                    <option></option>
                    <option value="ativo">Ativo da Bolsa de Valores</option>
                    <option value="pessoal">Investimento Pessoal</option>
                </select>
                <hr>
                <br/>
                <div id="formulario-ativo">
                    <form action="pdo/confirmar_ativo.php" method="post">
                        <label for="tipo-de-ativo">Tipo:</label>
                        <select name="tipo-de-ativo" required>
                            <option></option>
                            <option value="Ação">Ação</option>
                            <option value="BDR">BDR (Ação Estrangeira)</option>
                            <option value="FII">FII (Fundo Imobiliário)</option>
                            <option value="ETF">ETF (Fundo de Índice)</option>
                        </select>

                        <label for="cod">Código:</label>
                        <input type="text" name="cod" required>

                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required>

                        <label for="quantidade">Quantidade:</label>
                        <input type="number" name="quantidade" required>

                        <input type="submit" value="Confirmar">
                    </form>
                </div>
                <div id="formulario-pessoal">
                    <form action="pdo/confirmar_pessoal.php" method="post">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required>

                        <label for="valor">Valor: R$</label>
                        <input type="number" step=".02" name="valor" required>

                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" cols="30" rows="5"></textarea>

                        <input id="button-color-costumer" type="submit" value="Confirmar">
                    </form>
                </div>
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
    <script>
        $(document).ready(function() {
            $('#form-select').change(function(){
                var selected = $('#form-select').val();
                if(selected == 'ativo'){
                    $('#formulario-ativo').css('display', 'inherit');
                    $('#formulario-pessoal').css('display', 'none');
                }
                else if(selected == 'pessoal'){
                    $('#formulario-pessoal').css('display', 'inherit');
                    $('#formulario-ativo').css('display', 'none');
                }
                else{
                    $('#formulario-ativo').css('display', 'none');
                    $('#formulario-pessoal').css('display', 'none');
                }
            });
        });
    </script>
</body>
</html>