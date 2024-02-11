<?php
  class investimento{
    private $valor;
    private $data;

    //----------------Getters--------------------------------------- 
    function getValor(){
        return $this->valor;
    }
    function getData(){
        return $this->data;
    }
    //------------------Setters-------------------------------------
    function setValor($valor){
        $this->valor = $valor;
    }
    function setData($data){
        $this->data = $data;
    }
 }
