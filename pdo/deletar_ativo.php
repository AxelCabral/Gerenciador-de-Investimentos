<?php
    include_once ("connection.php");
    include_once ("DAO/ativo_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $at = new ativo_DAO();
    $at->deletar_ativo($id, $conn);

    header("location:../ativos.php");
