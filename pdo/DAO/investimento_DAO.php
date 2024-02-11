<?php
    class investimento_DAO{
        public function cadastrar_investimento($investimento, $connection){
            
            include_once ("classes/valor_de_investimento.php");

            try{
                $stmt = $connection->prepare("INSERT INTO valores_de_investimento(valor, data) 
                VALUES(:valor, :data)");
                $stmt->bindValue(":valor", $investimento->getValor());
                $stmt->bindValue(":data", $investimento->getData());
            
                $stmt->execute();
                
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return $e;
            }
        }
        public function obter_aportes($connection){
            try{
                $stmt = $connection->query("SELECT * FROM valores_de_investimento ORDER BY data DESC")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function obter_info_individual($id, $connection){
            try{
                $stmt = $connection->query("SELECT * FROM valores_de_investimento 
                WHERE id = '$id'")->fetchAll(PDO::FETCH_OBJ);
    
                return $stmt;
            }
            catch(PDOException $e){
                echo $e->getMessage();

                return null;
            }
        }
        public function deletar_investimento($id, $connection){
            try{
                $stmt = $connection->prepare("DELETE FROM valores_de_investimento WHERE id = :id");
                $stmt->bindValue(":id", $id);
    
                $stmt->execute();
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function editar_investimento($id, $investimento, $connection){

            include_once ("classes/valor_de_investimento.php");
    
            try{
                $stmt = $connection->prepare("UPDATE valores_de_investimento SET valor = ?, data = ? 
                WHERE id = ?");
    
                $stmt->bindValue(1, $investimento->getValor());
                $stmt->bindValue(2, $investimento->getData());
                $stmt->bindValue(3, $id);
    
                $stmt->execute();
    
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
    
                return false;
            }
        }
    }
