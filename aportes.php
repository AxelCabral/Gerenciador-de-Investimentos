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
    <title>Histórico de Aportes</title>
</head>
<body class="list-main-section">
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
        <div class="title">
            <div class="main-text-title">
                <h1>Histórico de Aportes de Investimento</h1>
            </div>
            <div class="new-item">
                <a href="novo_valor.php" title="Novo Aporte" target="_self" rel="next">
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
                    <tr><th>Valor</th><th>Data</th><th>Opções</th></tr>
                    
                    <?php
                        include_once ('pdo/connection.php');
                        include_once ('pdo/DAO/investimento_DAO.php');
            
                        $c = new connection();
                        $conn = $c->connect();
            
                        $select = new investimento_DAO();
                        $stmt = $select->obter_aportes($conn);
            
                        if($stmt == null){
                    ?>
                            </table>
                            <p>Nenhum aporte foi encontrado.</p>
                    <?php
                        }
                        else{
                            foreach($stmt as $inv){
                    ?>
                                <tr>
                                    <td>R$<?=number_format($inv->valor, 2, ',', '.');?></td>
                                    <td><?=date('d/m/Y', strtotime($inv->data));?></td>
                                    <td>
                                        <a href="pdo/editar_investimento.php?id=<?=$inv->id;?>" title='Editar'>
                                            <lord-icon src="css/icons/edit.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon></a>
                                        │
                                        <a href="pdo/deletar_investimento.php?id=<?=$inv->id;?>" title='Deletar'>
                                            <lord-icon src="css/icons/delete.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon>
                                        </a>
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