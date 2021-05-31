<?php
    session_start();
    
    include_once __DIR__ .'/model/DAO/agencyDAO.php';
    include_once __DIR__ . '/model/DAO/eventDAO.php';
    include_once __DIR__ .'/model/DAO/modelDAO.php';
    include_once __DIR__ . '/model/DAO/reservationDAO.php';
    include_once __DIR__ . '/model/DAO/used_deviceDAO.php';

    if (isset($_SESSION['user_id']) and isset($_SESSION['username'])):
        $logged = true;
        $agency = agencyDAO::getAgency($_SESSION['user_id']);
        if($agency->isEnabled()){
            $enabled = true;
        }
        else{
            $enabled = false;
        }
    endif;
    
    try{
        $event = eventDAO::getEvent($_GET['id']);
    }
    catch(PDOException){
        ?>
        <script> alert("l'evento non esiste o non é ancora stato aperto")
                     setTimeout(
                        function(){
                            window.location.replace('/');
                        },
                        10
                    ) 
        </script>
        <?php
    }
    
    
    if($event->getOpensAt() > date("Y-m-d h:i:s")){
        ?>
        <script> alert("l'evento non esiste o non é ancora stato aperto")
                     setTimeout(
                        function(){
                            window.location.replace('/');
                        },
                        10
                    ) 
        </script>
        <?php
    }

    

    if(isset($_POST['add_submit'])){
        if(empty($_POST['model'])){
            $_SESSION['msg_txt'] = "Almeno un campo non é stato compilato correttamente.";
            $_SESSION['msg_type'] = "error";
        }
        else{
            $sql = "INSERT INTO used_devices (date_created, reservation, id_model)";
        }
    }
    if(isset($_POST['remove_submit'])){
        //query per rimuovere device
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Way Spa - reservation</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="<?php __DIR__ ?> /res/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include_once __DIR__ . '/components/navbar.php'; ?>

    <?php
        if($logged){
            if($enabled){
                ?>
                <p class="mt-16 mx-12 md:mx-16 text-4xl text-green-300 uppercase font-bold"><?php echo($event->getName() . "  " . "<i class='text-gray-300 font-normal text-2xl'>(" . date("d/m/Y", strtotime($event->getStartDay())) . " - " . date("d/m/Y", strtotime($event->getEndDay())) . ")</i>" ); ?></p>
                <div class="mt-10 mx-8 md:mx-32  grid grid-cols-1 md:grid-cols-2">

                    <div>
                        <?php
                        
                            if(agencyDAO::isInEvent($_GET['id'], $_SESSION['user_id'])){
                                $reservation = reservationDAO::getReservationByAgencyAndEvent($agency->getId(),$_GET['id']);
                                $devices = used_deviceDAO::getUsedDevicesListInReservation($reservation->getId());

                                foreach($devices as $d){
                                    $d = modelDAO::getModel($d->getModel());
                                ?>
                                
                                    <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
                                        <div class="p-4">
                                            <h3 class="font-medium text-gray-600 text-lg my-2 uppercase"><?php echo($d->getName() . " -  " . $d->getBrand()); ?></h3>
                                            <p class="text-justify">Min freq <?php echo($d->getMinHZ() / 1000000) ?> mHz - Max freq <?php echo($d->getMaxHZ() / 1000000) ?> mhz</p>
                                            <div class="mt-5">
                                                <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">rimuovi</a>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                            }
                            else{
                                echo("<p class='mt-16 mx-12 md:mx-16 text-xl text-green-300 font-bold'>Non sei ancora prenotato per questo evento, <br /> inizia ad aggiungere i dispositivi</p>");
                            }

                        ?>

                        <div class="">
                            <form action="<? $_SERVER['PHP_SELF']?>" method="post">
                                <div class="p-4 grid md:grid-cols-2 grid-cols-1">
                                    <div class="relative inline-flex">
                                    <svg class="w-2 h-2 absolute top-2 md:top-0 right-32 md:right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                                    <select class="border border-gray-300 mt-2 rounded-full text-gray-600 h-10 pl-3 pr-8 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="model" id="model">
                                        <?php 
                                            include_once __DIR__ . '/model/DAO/modelDAO.php';
                                            foreach(modelDAO::getModelsList() as $model){
                                                echo("<option class='font-bold py-3' value=" . $model->getID() . ">". $model->getName() . " - " . $model->getBrand() ."</option>");
                                            }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="">
                                        <input type="submit" name="submit" value="aggiungi dispositivo" class="mt-2 bg-purple-600 px-3 uppercase text-md font-bold text-white py-2 font-semibold font-2xl rounded-full "></input>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="grid grid-cols-1">
                        <div class="rounded-2xl shadow-xl mb-10" id="osm-map"></div>
                        <div class="p-5 font-medium text-gray-600 text-md rounded-2xl mb-10 md:bg-gradient-to-r bg-gradient-to-b from-green-400 to-blue-100 shadow-xl"><p class="text-lg uppercase text-purple-600 ml-3 font-bold">descrizione:</p><p class="rounded-2xl p-3 bg-white"><?php echo($event->getDescription()) ?></p></div>
                    </div>
                    
                </div>

                <?php
            }
            else{
                
                ?>
                
                <script> alert("il tuo account non é ancora stato abilitato")
                     setTimeout(
                        function(){
                            window.location.replace('/');
                        },
                        10
                     ) 
                </script>
                <?php
            }
        }
        else{
            ?>
            <script> alert("devi fare l'accesso per poterti prenotare")
                     setTimeout(
                        function(){
                            window.location.replace('/');
                        },
                        10
                     ) 
            </script>
            <?php
            
        }
    ?>


    <?php include_once __DIR__ . '/components/footer.php' ?>
    <script src="<?php __DIR__?> /res/js/functions.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script> generateMap(<?php echo($event->getLatitude()) ?>,<?php echo($event->getLatitude()) ?>) </script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>

</body>
</html>