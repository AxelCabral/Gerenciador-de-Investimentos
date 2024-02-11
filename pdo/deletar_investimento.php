<?php
    include_once ("connection.php");
    include_once ("DAO/investimento_DAO.php");

    $id = $_GET['id'];

    $c = new connection();
    $conn = $c->connect();

    $inv = new investimento_DAO();
    $inv->deletar_investimento($id, $conn);

    header("location:../aportes.php");
