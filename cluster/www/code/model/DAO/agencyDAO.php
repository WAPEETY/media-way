<?php
include_once __DIR__ . '/classes/connection.php';
include_once __DIR__ . '/classes/agency.php';

class agencyDAO{
    static function getAgency(int $id): Agency{
        $sql = "SELECT name, PEC, enabled"
                . " FROM agencies WHERE id = NULLIF(:id, '')";

                try {
                    $conn = Connection::getConnection();
                    $stm = $conn->prepare($sql);
                    $stm->bindParam(':id', $id, PDO::PARAM_INT);
                    $stm->execute();
                    if (!$row = $stm->fetch(PDO::FETCH_ASSOC)) {
                        throw new PDOException('<strong>agenzia non trovata</strong>');
                    }
                    
                    $name = $row['name'];
                    $pec = $row['PEC'];
                    $enabled = $row['enabled'];

                    $agency = new Agency($id, $_SESSION['username'], '', $pec, $name,$enabled);
                    
                    } catch (PDOException $e) {
                    throw $e;
                } catch (Exception $e) {
                    throw new Exception("<strong>errore imprevisto,</strong>");
                }
                return $agency;
    }
}
?>