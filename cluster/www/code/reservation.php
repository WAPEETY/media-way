<?php
    session_start();
    
    include_once __DIR__ .'/model/DAO/agencyDAO.php';
    include_once __DIR__ . '/model/DAO/eventDAO.php';

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

    $event = eventDAO::getEvent($_GET['id']);
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
                        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
                            <div class="p-4">
                                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Nome dispositivo - marca</h3>
                                <p class="text-justify"></p>
                                <div class="mt-5">
                                    <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">prenota</a>
                                </div>
                            </div>
                        </div>
                        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
                            <div class="p-4 grid grid-cols-2">
                                <div class="font-medium text-gray-600 text-lg my-2 uppercase">
                                    <select class="rounded-full py-2 px-3 font-semibold" name="model" id="model">
                                        <?php 
                                            include_once __DIR__ . '/model/DAO/modelDAO.php';
                                            foreach(modelDAO::getModelsList() as $model){
                                                echo("<option value=" . $model->getID() . ">". $model->getName() . " - " . $model->getBrand() ."</option>");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="my-2">
                                    <a href="" class="hover:bg-gray-700 py-2 font-semibold font-2xl rounded-full hover:text-white bg-gray-400 text-gray-100">prenota</a>
                                </div>
                            </div>
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