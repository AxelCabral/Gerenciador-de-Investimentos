<?php
    include_once ("pdo/connection.php");
    include_once ("pdo/DAO/investimento_DAO.php");
    include_once ("pdo/DAO/pessoal_DAO.php");

    $c = new connection();
    $conn = $c->connect();

    $select = new investimento_DAO();
    $stmt = $select->obter_aportes($conn);

    $select = new pessoal_DAO();
    $stmt2 = $select->obter_investimentos_pessoais($conn);

    $total_bolsa = 0.00;
    $total_pessoal = 0.00;

    foreach($stmt as $valores){
        $total_bolsa += $valores->valor;
    }
    foreach($stmt2 as $valores){
        $total_pessoal += $valores->valor;
    }
    $total = $total_bolsa+$total_pessoal;

?>
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
    <title>Controle de Investimentos</title>
</head>
<body>
    <div class="titulo-principal">
        <h1>Sistema de Controle de Investimentos</h1>
    </div>
    <header class="menu">
        <h2>Valor Investido na Bolsa │<div class="valor-oculto"><text id="gvl-3">R$ <?= number_format($total_bolsa, 2, ',', '.'); ?>
            </text></div>
            <lord-icon id="vl-3" src="css/icons/eye.json"
            trigger="click"
            colors="primary:#ffffff,secondary:#ffffff"
            style="width:45px;height:auto;">
            </lord-icon>
        </h2>
        <h2>Valor de investimentos Pessoais │<div class="valor-oculto"><text id="gvl-2">R$ <?= number_format($total_pessoal, 2, ',', '.'); 
            ?></text></div>
            <lord-icon id="vl-2" src="css/icons/eye.json"
            trigger="click"
            colors="primary:#ffffff,secondary:#ffffff"
            style="width:45px;height:auto;">
            </lord-icon>
        </h2>
        <h2>Valor Investido │<div class="valor-oculto"><text id="gvl-1">R$ <?= number_format($total, 2, ',', '.'); ?></text></div>
            <lord-icon id="vl-1" src="css/icons/eye.json"
            trigger="click"
            colors="primary:#ffffff,secondary:#ffffff"
            style="width:45px;height:auto;">
            </lord-icon>
        </h2>
        <div class="options-fl">
            <div class="options">
                <div class="opt-icon">
                    <a href="aportes.php" id="aportes" target="_self" rel="next">
                        <lord-icon src="css/icons/list.json"
                        trigger="hover"
                        colors="primary:#000,secondary:#000"
                        style="width:60px;height:auto;">
                        </lord-icon>
                    </a>    
                </div>
                <a href="aportes.php" id="aportes" target="_self" rel="next">Histórico de aportes</a>
            </div>
            <div class="options">
                <div class="opt-icon">
                    <a href="novo_valor.php" id="novo_valor" target="_self" rel="next">
                        <lord-icon src="css/icons/econom.json"
                        trigger="hover"
                        colors="primary:#000,secondary:#000"
                        style="width:60px;height:auto;">
                        </lord-icon>
                    </a>
                </div>
                <a href="novo_valor.php" id="novo_valor" target="_self" rel="next">Investir Valor</a>
            </div>
        </div>
    </header>
    <main>
        <section>
            <nav class="options-sl">
                <div class="options">
                    <div class="opt-icon">
                        <a href="ativos.php" id="ativos" target="_self" rel="next">
                            <lord-icon src="css/icons/valores.json"
                            trigger="hover"
                            colors="primary:#000,secondary:#000"
                            style="width:60px;height:auto;">
                            </lord-icon>
                        </a>    
                    </div>
                    <a href="ativos.php" id="ativos" target="_self" rel="next">Ativos da Bolsa de Valores</a>
                </div>
                <div class="options">
                    <div class="opt-icon">
                        <a href="pessoais.php" id="pessoais" target="_self" rel="next">
                            <lord-icon src="css/icons/grafico.json"
                            trigger="hover"
                            colors="primary:#000,secondary:#000"
                            style="width:60px;height:auto;">
                            </lord-icon>
                        </a>    
                    </div>
                    <a href="pessoais.php" id="pessoais" target="_self" rel="next">Investimentos Pessoais</a>
                </div>
                <div class="options">
                    <div class="opt-icon">
                        <a href="novo_investimento.php" id="novo_investimento" target="_self" rel="next">
                            <lord-icon src="css/icons/mais.json"
                            trigger="none"
                            colors="primary:#000,secondary:#000"
                            style="width:60px;height:auto;">
                            </lord-icon>
                        </a>    
                    </div>
                    <a href="novo_investimento.php" id="novo_investimento" target="_self" rel="next">Novo Investimento</a>
                </div>
            </nav>
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
            $('#vl-1').click(function(){
                if($('#gvl-1').css('visibility') == 'visible'){
                    $('#gvl-1').css('visibility', 'hidden');
                }
                else{
                    $('#gvl-1').css('visibility', 'visible')();
                }
            });
            $('#vl-2').click(function(){
                if($('#gvl-2').css('visibility') == 'visible'){
                    $('#gvl-2').css('visibility', 'hidden');
                }
                else{
                    $('#gvl-2').css('visibility', 'visible')();
                }
            });
            $('#vl-3').click(function(){
                if($('#gvl-3').css('visibility') == 'visible'){
                    $('#gvl-3').css('visibility', 'hidden');
                }
                else{
                    $('#gvl-3').css('visibility', 'visible')();
                }
            });
        });
    </script>
</body>
</html>