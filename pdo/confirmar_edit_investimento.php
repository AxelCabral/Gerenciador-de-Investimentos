<?php
    include_once ("connection.php");
    include_once ("classes/valor_de_investimento.php");
    include_once ("DAO/investimento_DAO.php");

    if(isset($_POST['id'], $_POST['valor'], $_POST['data'])&& $_POST['id'] != "" && 
    $_POST['valor'] != "" && $_POST['data'] != ""){

        $id = $_POST['id'];

        $c = new connection();
        $conn = $c->connect();

        $inv = new investimento();
        $inv->setValor($_POST['valor']);
        $inv->setData($_POST['data']);

        $edit = new investimento_DAO();
        $result = $edit->editar_investimento($id, $inv, $conn);

        if($result == true){
            $message = "Sucesso! Os dados do aporte foram alterados com êxito.";
        }
        else if($result == false){
            $message = "Erro! Verifique se o servidor foi inicializado corretamente.";
        }
        else{
            $message = "Erro desconhecido! ".$result;
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
    <title>Confirmação de Edição de Aporte</title>
</head>
<body>
    <header>
        <div class="return">
            <a href="../aportes.php" title="Voltar" target="_self" rel="prev">
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
                <h1>Edição de Aporte de Investimento</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out-form">
            <div class="form-style">
                <p><?=$message?></p>
                <a href="../aportes.php" target="_self" rel="prev">Voltar aos aportes</a>
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