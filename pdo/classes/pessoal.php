<?php
  class pessoal{
    private $nome;
    private $valor;
    private $descricao;
    private $data;

    //----------------Getters--------------------------------------- 
    function getNome(){
        return $this->nome;
    }
    function getValor(){
        return $this->valor;
    }
    function getDescricao(){
        return $this->descricao;
    }
    function getData(){
        return $this->data;
    }
    //------------------Setters-------------------------------------
    function setNome($nome){
        $this->nome = $nome;
    }
    function setValor($valor){
        $this->valor = $valor;
    }
    function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    function setData($data){
        $this->data = $data;
    }
 }
