<?php
    class pessoal_DAO{
        public function cadastrar_pessoal($pessoal, $connection){
            
            include_once ("classes/pessoal.php");

            try{
                $stmt = $connection->prepare("INSERT INTO pessoais(nome, valor, descricao, data) 
                VALUES(:nome, :valor, :descricao, :data)");
                $stmt->bindValue(":nome", $pessoal->getNome());
                $stmt->bindValue(":valor", $pessoal->getValor());
                $stmt->bindValue(":descricao", $pessoal->getDescricao());
                $stmt->bindValue(":data", $pessoal->getData());
            
                $stmt->execute();
                
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return $e;
            }
        }
        public function obter_investimentos_pessoais($connection){
            try{
                $stmt = $connection->query("SELECT * FROM pessoais ORDER BY data DESC")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_info_individual($id, $connection){
            try{
                $stmt = $connection->query("SELECT * FROM pessoais WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function deletar_investimento_pessoal($id, $connection){
            try{
                $stmt = $connection->prepare("DELETE FROM pessoais WHERE id = :id");
                $stmt->bindValue(":id", $id);
    
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function editar_investimento_pessoal($id, $pessoal, $connection){

            include_once ("classes/pessoal.php");
    
            try{
                $stmt = $connection->prepare("UPDATE pessoais SET nome = ?, valor = ?, descricao = ?, data = ? 
                WHERE id = ?");
    
                $stmt->bindValue(1, $pessoal->getNome());
                $stmt->bindValue(2, $pessoal->getValor());
                $stmt->bindValue(3, $pessoal->getDescricao());
                $stmt->bindValue(4, $pessoal->getData());
                $stmt->bindValue(5, $id);
    
                $stmt->execute();
    
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
    
                return false;
            }
        }
    }
