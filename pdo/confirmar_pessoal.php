<?php
    include_once ("connection.php");
    include_once ("classes/pessoal.php");
    include_once ("DAO/pessoal_DAO.php");

    if(isset($_POST['nome'], $_POST['valor'],  $_POST['descricao'])&& $_POST['nome'] != "" && 
    $_POST['valor'] != "" && $_POST['descricao'] != ""){

        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date("Y-m-d");  

        $c = new connection();
        $conn = $c->connect();

        $ps = new pessoal();
        $ps->setNome($_POST['nome']);
        $ps->setValor($_POST['valor']);
        $ps->setDescricao($_POST['descricao']);
        $ps->setData($hoje);

        $cadastrar = new pessoal_DAO();
        $resultado = $cadastrar->cadastrar_pessoal($ps, $conn);

        if($resultado == true){
            $message = "Sucesso! O investimento pessoal foi registrado com êxito.";
        }
        else if($resultado == false){
            $message = "Erro! Verifique se o servidor foi inicializado corretamente.";
        }
        else{
            $message = "Erro desconhecido! ".$resultado;
        }
    }
    else{
        $message = "Erro! As informações enviadas não são válidas, por favor tente novamente.";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet" />
    <link href="../css/fonts.css" rel="stylesheet" />
    <link rel="icon" href="../img/logo.png">
    <script src="../js/lord-icon.js"></script>
    <title>Confirmação de Investimento Pessoal</title>
</head>
<body>
    <header>
        <div class="return">
            <a href="../pessoais.php" title="Voltar" target="_self" rel="prev">
                <lord-icon src="../css/icons/return.json"
                    trigger="hover"
                    delay="1000"
                    colors="primary:#000,secondary:#ffffff"
                    style="width:30px;height:auto;padding-bottom:10px;padding-left:5px;">
                </lord-icon>
            </a>
        </div>
        <div class="title-form" id="costumer-title">
            <div class="main-text-title">
                <h1>Novo Investimento</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out-form">
            <div class="form-style">
                <p><?=$message?></p>
                <a href="../novo_investimento.php" target="_self" rel="prev">Registrar outro investimento</a>
            </div>
        </section>
    </main>
    <footer>
        <p id="footer-text">Controle de Investimentos by <strong>Axel Cabral</strong> 
        <lord-icon src="../css/icons/iota.json"
        trigger="loop"
        delay="1000"
        colors="primary:#ffffff,secondary:#ffffff"
        style="width:25px;height:auto;padding-bottom:10px;">
        </lord-icon>
        │ &copy; Todos os direitos reservados.</p>
    </footer>
</body>
</html>