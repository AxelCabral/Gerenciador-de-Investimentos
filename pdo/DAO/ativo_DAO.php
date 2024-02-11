<?php
    class ativo_DAO{
        public function cadastrar_ativo($ativo, $connection){
            
            include_once ("classes/ativo.php");

            try{
                $stmt = $connection->prepare("INSERT INTO ativos(tipo, cod, nome, quantidade, data) 
                VALUES(:tipo, :cod, :nome, :quantidade, :data)");
                $stmt->bindValue(":tipo", $ativo->getTipo());
                $stmt->bindValue(":cod", $ativo->getCod());
                $stmt->bindValue(":nome", $ativo->getNome());
                $stmt->bindValue(":quantidade", $ativo->getQuantidade());
                $stmt->bindValue(":data", $ativo->getData());
            
                $stmt->execute();
                
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return $e;
            }
        }
        public function obter_ativos($connection){
            try{
                $stmt = $connection->query("SELECT * FROM ativos")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_ativos_1($connection){
            try{
                $stmt = $connection->query("SELECT * FROM ativos WHERE tipo = 'Ação' ORDER BY cod")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_ativos_2($connection){
            try{
                $stmt = $connection->query("SELECT * FROM ativos WHERE tipo = 'BDR' ORDER BY cod")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_ativos_3($connection){
            try{
                $stmt = $connection->query("SELECT * FROM ativos WHERE tipo = 'FII' ORDER BY cod")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_ativos_4($connection){
            try{
                $stmt = $connection->query("SELECT * FROM ativos WHERE tipo = 'ETF' ORDER BY cod")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_info_individual($id, $connection){
            try{
                $stmt = $connection->query("SELECT * FROM ativos WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function deletar_ativo($id, $connection){
            try{
                $stmt = $connection->prepare("DELETE FROM ativos WHERE id = :id");
                $stmt->bindValue(":id", $id);
    
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function editar_ativo($id, $ativo, $connection){

            include_once ("classes/ativo.php");
    
            try{
                $stmt = $connection->prepare("UPDATE ativos SET tipo = ?, cod = ?, nome = ?, quantidade = ?, data = ? 
                WHERE id = ?");
    
                $stmt->bindValue(1, $ativo->getTipo());
                $stmt->bindValue(2, $ativo->getCod());
                $stmt->bindValue(3, $ativo->getNome());
                $stmt->bindValue(4, $ativo->getQuantidade());
                $stmt->bindValue(5, $ativo->getData());
                $stmt->bindValue(6, $id);
    
                $stmt->execute();
    
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
    
                return false;
            }
        }
        public function somar_ativo($cod, $ativo, $connection){

            include_once ("classes/ativo.php");
    
            try{
                $stmt = $connection->prepare("UPDATE ativos SET quantidade = quantidade+?, data = ? 
                WHERE cod = ?");
    
                $stmt->bindValue(1, $ativo->getQuantidade());
                $stmt->bindValue(2, $ativo->getData());
                $stmt->bindValue(3, $cod);
    
                $stmt->execute();
    
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
    
                return false;
            }
        }
    }
