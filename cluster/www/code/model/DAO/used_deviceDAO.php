<?php

include_once __DIR__ . '/classes/connection.php';
include_once __DIR__ . '/classes/used_device.php';

    class used_deviceDAO{
        static function getUsedDevice(int $id){
            $sql = "SELECT freq, reservation, idModel"
             . "FROM used_devices"
             . "WHERE id = NULLIF(:id, '')";

            try {
                $conn = Connection::getConnection();
                $stm = $conn->prepare($sql);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                if (!$row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    throw new PDOException('<strong>dispositivo non trovato</strong>');
                }
                
                $freq = $row['freq'];
                $reservation = $row['reservation'];
                $model = $row['idModel'];

                $used_device = new UsedDevice($id, $freq, $reservation, $model);
                
                } catch (PDOException $e) {
                throw $e;
            } catch (Exception $e) {
                throw new Exception("<strong>errore imprevisto</strong>");
            }
            return $used_device;
        }

        static function getUsedDevicesListInReservation(int $reservation){
            $sql = "SELECT id, freq, reservation, idModel"
             . " FROM used_devices"
             . " WHERE reservation = NULLIF(:reservation, '')";
            
            $usedDevicesList = array();
            try {
                $conn = Connection::getConnection();
                $stm = $conn->prepare($sql);
                $stm->bindParam(':reservation', $reservation, PDO::PARAM_INT);
                
                $stm->execute();
                
                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                    $id = intval($row['id']);
                    $freq = $row['freq'];
                    $reservation = intval($row['reservation']);
                    $idModel = intval($row['idModel']);

                    if(is_null($freq)){
                        $freq = floatval(0);
                    }

                    $used_device = new Used_device($id, $freq, $reservation, $idModel);
                    $usedDevicesList[] = $used_device;
                }
                } catch (PDOException $e) {
                throw $e;
            } catch (Exception $e) {
                throw new Exception("<strong>errore imprevisto</strong>");
            }
           return $usedDevicesList;
        }

        static function addDevice(Used_device $dev){
            $now = date("y-m-d h:i:s");
            $sql = "INSERT INTO used_devices (date_created, reservation, idModel)"
                .  " VALUES (:date_created, :reservation, :id_model)";
            $conn = Connection::getConnection();
            try{
                $stm = $conn->prepare($sql);
                
                $reservation = $dev->getReservation();
                $model = $dev->getModel();

                $stm->bindParam(':date_created',$now, PDO::PARAM_STR);
                $stm->bindParam(':reservation', $reservation, PDO::PARAM_INT);
                $stm->bindParam(':id_model', $model, PDO::PARAM_INT);
                $stm->execute();
            
            
                if ($stm->rowCount() > 0){
                    $_SESSION['msg_txt'] = "dipositivo aggiunto con successo";
                    $_SESSION['msg_type'] = "success";

                }else{
                    $_SESSION['msg_txt'] = "Si é verificato un problema con l'inserimento dei dati";
                    $_SESSION['msg_type'] = "error";
                }
            } 
            catch(PDOException $e) {
            $_SESSION['msg_txt'] = "Attenzione, il dispositivo non è stato aggiunto: " . $e->getMessage();
            $_SESSION['msg_type'] = 'error';
            }
    }
}
?>