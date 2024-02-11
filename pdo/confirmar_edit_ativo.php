<?php
    include_once ("connection.php");
    include_once ("classes/ativo.php");
    include_once ("DAO/ativo_DAO.php");

    if(isset($_POST['tipo-de-ativo'], $_POST['cod'], $_POST['nome'], $_POST['quantidade'], $_POST['data'],
    $_POST['id'])&& $_POST['tipo-de-ativo'] != "" && $_POST['cod'] != "" && $_POST['nome'] != "" && 
    $_POST['quantidade'] != "" && $_POST['data'] != "" && $_POST['id'] != ""){

        $id = $_POST['id'];

        $c = new connection();
        $conn = $c->connect();

        $at = new ativo();
        $at->setTipo($_POST['tipo-de-ativo']);
        $at->setCod($_POST['cod']);
        $at->setNome($_POST['nome']);
        $at->setQuantidade($_POST['quantidade']);
        $at->setData($_POST['data']);

        $edit = new ativo_DAO();
        $result = $edit->editar_ativo($id, $at, $conn);

        if($result == true){
            $message = "Sucesso! Os dados do ativo foram alterados com êxito.";
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
    <title>Confirmação de Edição de Ativo</title>
</head>
<body>
    <header>
        <div class="return">
            <a href="../ativos.php" title="Voltar" target="_self" rel="prev">
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
                <h1>Edição de Ativos da Bolsa</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out-form">
            <div class="form-style">
                <p><?=$message?></p>
                <a href="../ativos.php" target="_self" rel="prev">Voltar aos ativos</a>
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