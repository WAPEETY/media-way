<?php
include_once __DIR__ . '/classes/connection.php';
include_once __DIR__ . '/classes/model.php';

class modelDAO{
    static function getModel(int $id):Model{
        $sql = "SELECT models.id, models.name, models.min_freq, models.max_freq, brands.name AS bname"
             . " FROM models"
             . " INNER JOIN brands"
             . " ON models.brand = brands.id"
             . " WHERE models.id = NULLIF(:id, '')";

             try {
                $conn = Connection::getConnection();
                $stm = $conn->prepare($sql);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                if (!$row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    throw new PDOException('<strong>modello non trovato</strong>');
                }
                
                $name = $row['name'];
                $min_freq = $row['min_freq'];
                $max_freq = $row['max_freq'];
                $bname = $row['bname'];

                $model = new Model($id, $name, $min_freq, $max_freq, $bname);
                
                } catch (PDOException $e) {
                throw $e;
            } catch (Exception $e) {
                throw new Exception("<strong>errore imprevisto</strong>");
            }
            return $model;
    }

    static function getModelsList(){
        $sql = "SELECT models.id, models.name, models.min_freq, models.max_freq, brands.name AS bname "
             . "FROM models "
             . "INNER JOIN brands "
             . "ON models.brand = brands.id "
             . "ORDER BY brands.name ";
        
        $modelList = array();
        try {
            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            
            $stm->execute();
            
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $id = intval($row['id']);
                $name = $row['name'];
                $min_freq = intval($row['min_freq']);
                $max_freq = intval($row['max_freq']);
                $bname = $row['bname'];

                $model = new Model($id, $name, $min_freq, $max_freq, $bname);

                $modelList[] = $model;
            }
            } catch (PDOException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception("<strong>errore imprevisto</strong>");
        }

        
        

        return $modelList;
    }
}
?>