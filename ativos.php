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
    <title>Ativos da Bolsa de Valores</title>
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
        <div class="title" id="costumer-title">
            <div class="main-text-title">
                <h1>Ativos da Bolsa de Valores</h1>
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
    <main style="margin-top: 20px;">  
        <div class="title">
            <div class="main-text-title">
                <h2>Ações</h2>
            </div>
        </div>
        <section class="list-out">
            <div class="data-table-large">
                <table border='0'>
                    <tr><th>Tipo</th><th>Código</th><th>Nome</th><th>Quantidade</th><th>Data</th><th>Opções</th></tr>
                    
                    <?php
                        include_once ('pdo/connection.php');
                        include_once ('pdo/DAO/ativo_DAO.php');
            
                        $c = new connection();
                        $conn = $c->connect();
            
                        $select = new ativo_DAO();
                        $stmt = $select->obter_ativos_1($conn);
            
                        if($stmt == null){
                    ?>
                            <tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                    <?php
                        }
                        else{
                            foreach($stmt as $at){
                    ?>
                                <tr>
                                    <td><?= $at->tipo ?></td>
                                    <td><?= $at->cod ?></td>
                                    <td><?= $at->nome ?></td>
                                    <td><?= $at->quantidade ?></td>
                                    <td><?=date('d/m/Y', strtotime($at->data));?></td>
                                    <td>
                                        <a href="pdo/editar_ativo.php?id=<?=$at->id;?>" title='Editar'>
                                            <lord-icon src="css/icons/edit.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon></a>
                                        │
                                        <a href="pdo/deletar_ativo.php?id=<?=$at->id;?>" title='Deletar'>
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
        <div class="title">
            <div class="main-text-title">
                <h2>BDRs</h2>
            </div>
        </div>
        <section class="list-out">
            <div class="data-table-large">
                <table border='0'>
                    <tr><th>Tipo</th><th>Código</th><th>Nome</th><th>Quantidade</th><th>Data</th><th>Opções</th></tr>
                    
                    <?php
                        include_once ('pdo/connection.php');
                        include_once ('pdo/DAO/ativo_DAO.php');
            
                        $c = new connection();
                        $conn = $c->connect();
            
                        $select = new ativo_DAO();
                        $stmt = $select->obter_ativos_2($conn);
            
                        if($stmt == null){
                    ?>
                            <tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                    <?php
                        }
                        else{
                            foreach($stmt as $at){
                    ?>
                                <tr>
                                    <td><?= $at->tipo ?></td>
                                    <td><?= $at->cod ?></td>
                                    <td><?= $at->nome ?></td>
                                    <td><?= $at->quantidade ?></td>
                                    <td><?=date('d/m/Y', strtotime($at->data));?></td>
                                    <td>
                                        <a href="pdo/editar_ativo.php?id=<?=$at->id;?>" title='Editar'>
                                            <lord-icon src="css/icons/edit.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon></a>
                                        │
                                        <a href="pdo/deletar_ativo.php?id=<?=$at->id;?>" title='Deletar'>
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
        <div class="title">
            <div class="main-text-title">
                <h2>FIIs</h2>
            </div>
        </div>
        <section class="list-out">
            <div class="data-table-large">
                <table border='0'>
                    <tr><th>Tipo</th><th>Código</th><th>Nome</th><th>Quantidade</th><th>Data</th><th>Opções</th></tr>
                    
                    <?php
                        include_once ('pdo/connection.php');
                        include_once ('pdo/DAO/ativo_DAO.php');
            
                        $c = new connection();
                        $conn = $c->connect();
            
                        $select = new ativo_DAO();
                        $stmt = $select->obter_ativos_3($conn);
            
                        if($stmt == null){
                    ?>
                            <tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                    <?php
                        }
                        else{
                            foreach($stmt as $at){
                    ?>
                                <tr>
                                    <td><?= $at->tipo ?></td>
                                    <td><?= $at->cod ?></td>
                                    <td><?= $at->nome ?></td>
                                    <td><?= $at->quantidade ?></td>
                                    <td><?=date('d/m/Y', strtotime($at->data));?></td>
                                    <td>
                                        <a href="pdo/editar_ativo.php?id=<?=$at->id;?>" title='Editar'>
                                            <lord-icon src="css/icons/edit.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon></a>
                                        │
                                        <a href="pdo/deletar_ativo.php?id=<?=$at->id;?>" title='Deletar'>
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
        <div class="title">
            <div class="main-text-title">
                <h2>ETFs</h2>
            </div>
        </div>
        <section class="list-out">
            <div class="data-table-large">
                <table border='0'>
                    <tr><th>Tipo</th><th>Código</th><th>Nome</th><th>Quantidade</th><th>Data</th><th>Opções</th></tr>
                    
                    <?php
                        include_once ('pdo/connection.php');
                        include_once ('pdo/DAO/ativo_DAO.php');
            
                        $c = new connection();
                        $conn = $c->connect();
            
                        $select = new ativo_DAO();
                        $stmt = $select->obter_ativos_4($conn);
            
                        if($stmt == null){
                    ?>
                            <tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                    <?php
                        }
                        else{
                            foreach($stmt as $at){
                    ?>
                                <tr>
                                    <td><?= $at->tipo ?></td>
                                    <td><?= $at->cod ?></td>
                                    <td><?= $at->nome ?></td>
                                    <td><?= $at->quantidade ?></td>
                                    <td><?=date('d/m/Y', strtotime($at->data));?></td>
                                    <td>
                                        <a href="pdo/editar_ativo.php?id=<?=$at->id;?>" title='Editar'>
                                            <lord-icon src="css/icons/edit.json"
                                            trigger="hover"
                                            colors="primary:#000,secondary:#000"
                                            style="width:40px;height:auto;">
                                            </lord-icon></a>
                                        │
                                        <a href="pdo/deletar_ativo.php?id=<?=$at->id;?>" title='Deletar'>
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