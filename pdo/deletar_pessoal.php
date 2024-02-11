<?php
    include_once ("connection.php");
    include_once ("DAO/pessoal_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $ps = new pessoal_DAO();
    $ps->deletar_investimento_pessoal($id, $conn);

    header("location:../pessoais.php");
