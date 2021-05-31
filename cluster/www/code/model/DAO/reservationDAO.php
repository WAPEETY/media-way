<?php
include_once __DIR__ . '/classes/connection.php';
include_once __DIR__ . '/classes/reservation.php';

class reservationDAO{
    static function getReservation(int $id):Reservation{
        $sql = "SELECT agency, event"
             . "FROM reservations"
             . "WHERE id = NULLIF(:id, '')";

            try {
                $conn = Connection::getConnection();
                $stm = $conn->prepare($sql);
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                if (!$row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    throw new PDOException('<strong>prenotazione non trovata</strong>');
                }
                
                $agency = $row['agency'];
                $event = $row['event'];

                $reservation = new Reservation($id, $agency, $event);
                
                } catch (PDOException $e) {
                throw $e;
            } catch (Exception $e) {
                throw new Exception("<strong>errore imprevisto</strong>");
            }
            return $reservation;
    }

    static function getReservationByAgencyAndEvent(int $agency, int $event):Reservation{
        $sql = "SELECT id "
             . "FROM reservations "
             . "WHERE agency = NULLIF(:agency, '') AND event = NULLIF(:event, '')";

            try {
                $conn = Connection::getConnection();
                $stm = $conn->prepare($sql);
                $stm->bindParam(':agency', $agency, PDO::PARAM_INT);
                $stm->bindParam(':event', $event, PDO::PARAM_INT);
                $stm->execute();
                if (!$row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    throw new PDOException('<strong>prenotazione non trovata</strong>');
                }
                
                $id = $row['id'];

                $reservation = new Reservation($id, $agency, $event);
                
                } catch (PDOException $e) {
                throw $e;
            } catch (Exception $e) {
                throw new Exception("<strong>errore imprevisto</strong>");
            }
            return $reservation;
    }

    static function getReservationsList(){
        $sql = "SELECT agency, event"
             . "FROM reservations";
        
        $reservationList = array();
        try {
            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            
            $stm->execute();
            
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $id = intval($row['id']);
                $agency = intval($row['agency']);
                $event = intval($row['event']);

                $reservation = new Reservation($id, $agency, $event);

                $reservationList[] = $reservation;
            }
            } catch (PDOException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception("<strong>errore imprevisto</strong>");
        }
        return $reservationList;
    }

    static function getReservationsForEvent($eventId){
        $sql = "SELECT id, agency"
             . "FROM reservations"
             . "WHERE event = NULLIF(:event, '')";
        
        $reservationList = array();
        try {
            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            
            $stm->execute();
            
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $id = intval($row['id']);
                $agency = intval($row['agency']);
                
                $reservation = new Reservation($id, $agency, $eventId);

                $reservationList[] = $reservation;
            }
            } catch (PDOException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception("<strong>errore imprevisto</strong>");
        }
        return $reservationList;
    }

    static function addReservation(Reservation $obj){
        $now = date("y-m-d h:i:s");
        $sql = "INSERT INTO reservations (date_created, agency, event)"
            .  " VALUES (:date_created, :agency, :event)";
        $conn = Connection::getConnection();
        try{
            $stm = $conn->prepare($sql);  
            
            $agency = $obj->getAgency();
            $event = $obj->getEvent();
            $stm->bindParam(':date_created',$now, PDO::PARAM_STR);
            $stm->bindParam(':agency', $agency, PDO::PARAM_INT);
            $stm->bindParam(':event', $event, PDO::PARAM_INT);
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

    static function removeReservation(int $id){
        $sql = "DELETE FROM reservations"
            .  " WHERE id = :id";
        $conn = Connection::getConnection();
        try{
            $stm = $conn->prepare($sql);
            $stm->bindParam(':id',$id, PDO::PARAM_INT);
            $stm->execute();

            if ($stm->rowCount() > 0){
                $_SESSION['msg_txt'] = "prenotazione rimossa con successo";
                $_SESSION['msg_type'] = "success";

            }else{
                $_SESSION['msg_txt'] = "Si é verificato un problema con la rimozione dei dati";
                $_SESSION['msg_type'] = "error";
            }
        } 
        catch(PDOException $e) {
        $_SESSION['msg_txt'] = "Attenzione, la prenotazione non è stata rimossa: " . $e->getMessage();
        $_SESSION['msg_type'] = 'error';
        }
    }
}

?>