<?php
    include_once ("connection.php");
    include_once ("DAO/pessoal_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $ps = new pessoal_DAO();
    $stmt = $ps->obter_info_individual($id, $conn);
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
    <title>Edição de Investimento Pessoal</title>
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
                <h1>Edição de Investimentos Pessoais</h1>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out-form">
            <div class="form-style">
                <form action="confirmar_edit_pessoal.php" method="post">
                    <?php
                        foreach($stmt as $info){
                    ?>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="<?=$info->nome;?>" required>

                        <label for="valor">Valor: R$</label>
                        <input type="number" step=".02" name="valor" value="<?=$info->valor;?>" required>

                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" cols="30" rows="5"><?=$info->descricao;?></textarea>

                        <label for="data">Data do investimento:</label>
                        <input type="date" name="data" value="<?=$info->data;?>" required>

                        <input type="hidden" name="id" value="<?=$info->id;?>">
                        
                        <input id="button-color-costumer" type="submit" value="Confirmar">
                    <?php
                        }
                    ?>
                </form>
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