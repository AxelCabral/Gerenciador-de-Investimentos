<?php
  class ativo{
    private $tipo;
    private $cod;
    private $nome;
    private $quantidade;
    private $data;

    //----------------Getters--------------------------------------- 
    function getTipo(){
        return $this->tipo;
    }
    function getCod(){
        return $this->cod;
    }
    function getNome(){
        return $this->nome;
    }
    function getQuantidade(){
        return $this->quantidade;
    }
    function getData(){
        return $this->data;
    }
    //------------------Setters-------------------------------------
    function setTipo($tipo){
        $this->tipo = $tipo;
    }
    function setCod($cod){
        $this->cod = $cod;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
    function setData($data){
        $this->data = $data;
    }
  }
