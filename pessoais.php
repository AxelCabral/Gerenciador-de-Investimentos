<?php
    include_once ('pdo/connection.php');
    include_once ('pdo/DAO/pessoal_DAO.php');

    $c = new connection();
    $conn = $c->connect();

    $select = new pessoal_DAO();
    $stmt = $select->obter_investimentos_pessoais($conn);
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
    <script src="js/lord-icon.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Investimentos Pessoais</title>
</head>
<body>
    <section>
            <?php
                foreach($stmt as $invP){
            ?>
                <div id="popup-<?=$invP->id;?>" class="popup">
                    <div class="popup-area">
                        <p class="close-popup" id="close-popup-<?=$invP->id;?>">X</p>
                        
                        <h3>Descrição do Investimento <?=$invP->nome;?></h3>
                        <div class="data-table-popup">
                            <table border='0'>
                                <tr><td><?=$invP->descricao;?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </section>
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
        <div class="title" id="costumer-title">
            <div class="main-text-title">
                <h1>Investimentos Pessoais</h1>
            </div>
            <div class="new-item">
                <a href="novo_investimento.php" title="Novo Investimento" target="_self" rel="next">
                    <lord-icon src="css/icons/mais.json"
                    trigger="none"
                    colors="primary:#ffffff,secondary:#ffffff"
                    style="width:50px;height:auto">
                    </lord-icon>
                </a>
            </div>
        </div>
    </header>
    <main>
        <section class="list-out">
            <div class="data-table" id="data-table-costumer">
                <table border='0'>
                    <tr><th>Nome</th><th>Valor</th><th>Descrição</th><th>Data</th><th>Opções</th></tr>
                    
                    <?php
                        if($stmt == null){
                    ?>
                            </table>
                            <p>Nenhum investimento pessoal foi encontrado.</p>
                    <?php
                        }
                        else{
                            foreach($stmt as $ps){
                    ?>
                                <tr>
                                    <td><?= $ps->nome; ?></td>
                                    <td>R$ <?= number_format($ps->valor, 2, ',', '.'); ?></td>
                                    <td><a class="open-popup" id="open-popup-<?=$ps->id;?>">Ver Descrição</a></td>
                                    <td><?=date('d/m/Y', strtotime($ps->data));?></td>
                                    <td>
                                        <a href="pdo/editar_pessoal.php?id=<?=$ps->id;?>" title='Editar'>
                                            <lord-icon src="css/icons/edit.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon></a>
                                        │
                                        <a href="pdo/deletar_pessoal.php?id=<?=$ps->id;?>" title='Deletar'>
                                            <lord-icon src="css/icons/delete.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon>
                                        </a>
                                        <script>
                                            $(document).ready(function() {
                                                $('#open-popup-<?=$ps->id;?>').click(function(){
                                                    $('#popup-<?=$ps->id;?>').css("display", "inherit");
                                                });
                                                $('#close-popup-<?=$ps->id;?>').click(function(){
                                                    $('#popup-<?=$ps->id;?>').css("display", "none");
                                                });
                                            });
                                        </script>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
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