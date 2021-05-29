<?php
include_once __DIR__ . '/classes/connection.php';
include_once __DIR__ . '/classes/event.php';

class eventDAO{
    static function getEvent(int $id): Event{
        $sql = "SELECT name, latitude, longitude, start_day, end_day, description, opens_at"
                . " FROM events WHERE id = NULLIF(:id, '')";

                try {
                    $conn = Connection::getConnection();
                    $stm = $conn->prepare($sql);
                    $stm->bindParam(':id', $id, PDO::PARAM_INT);
                    $stm->execute();
                    if (!$row = $stm->fetch(PDO::FETCH_ASSOC)) {
                        throw new PDOException('<strong>evento non trovato</strong>');
                    }
                    
                    $name = $row['name'];
                    $latitude = $row['latitude'];
                    $longitude = $row['longitude'];
                    $start_day = $row['start_day'];
                    $end_day = $row['end_day'];
                    $description = $row['description'];
                    $opens_at = $row['opens_at'];

                    $event = new Event($id, $name, $latitude, $longitude, $start_day, $end_day, $description, $opens_at);
                    
                    } catch (PDOException $e) {
                    throw $e;
                } catch (Exception $e) {
                    throw new Exception("<strong>errore imprevisto,</strong>");
                }
                return $event;
    }

    public static function getFutureEvents() {
        $sql = "SELECT *
                FROM events
                WHERE CURDATE() < end_day AND CURDATE() > opens_at";
        $futureEvents = array();

        try {
            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            
            $stm->execute();
            
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $id = intval($row['id']);
                $name = $row['name'];
                $latitude = floatval($row['latitude']);
                $longitude = floatval($row['longitude']);
                $start_day = $row['start_day'];
                $end_day = $row['end_day'];
                $description = $row['description'];
                $opens_at = $row['opens_at'];

                $event = new Event($id, $name, $latitude, $longitude, $start_day, $end_day, $description, $opens_at);

                $futureEvents[] = $event;
            }
            } catch (PDOException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception("<strong>errore imprevisto,</strong>");
        }
        return $futureEvents;
    }
}
?>