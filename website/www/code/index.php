<?php 
    
    include_once __DIR__ . '/model/DAO/classes/connection.php';
    
    session_start();
    
    if (isset($_SESSION['user_id'], $_SESSION['username'])) :
        $logged = true;
        
    endif;
    
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="<?php __DIR__ ?> /res/css/style.css" rel="stylesheet">

    <title>Media Way Spa</title>
</head>
<body class="">
    <?php  echo(date("y-m-d h:i:s"))?>
    <?php include_once __DIR__ . '/components/navbar.php' ?>

    <p class="mt-16 mx-12 md:mx-16 text-4xl text-green-300 uppercase font-bold">Prossimi eventi: </p>

    <div class="mt-10 mx-8 md:mx-32  grid grid-cols-1 md:grid-cols-2">
        
        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
            <div class="p-4">
                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Nome evento</h3>
                <p class="text-justify">Event description <br/> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint quibusdam quo eum quos unde? Eaque pariatur esse, atque cum modi vitae, id exercitationem sapiente non, error tempore reprehenderit eveniet magnam.</p>
                <div class="mt-5">
                    <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">prenota</a>
                </div>
            </div>
        </div>

        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
            <div class="p-4">
                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Nome evento</h3>
                <p class="text-justify">Event description <br/> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint quibusdam quo eum quos unde? Eaque pariatur esse, atque cum modi vitae, id exercitationem sapiente non, error tempore reprehenderit eveniet magnam.</p>
                <div class="mt-5">
                    <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">prenota</a>
                </div>
            </div>
        </div>

        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
            <div class="p-4">
                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Nome evento</h3>
                <p class="text-justify">Event description <br/> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint quibusdam quo eum quos unde? Eaque pariatur esse, atque cum modi vitae, id exercitationem sapiente non, error tempore reprehenderit eveniet magnam.</p>
                <div class="mt-5">
                    <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">prenota</a>
                </div>
            </div>
        </div>

        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
            <div class="p-4">
                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Nome evento</h3>
                <p class="text-justify">Event description <br/> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint quibusdam quo eum quos unde? Eaque pariatur esse, atque cum modi vitae, id exercitationem sapiente non, error tempore reprehenderit eveniet magnam.</p>
                <div class="mt-5">
                    <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">prenota</a>
                </div>
            </div>
        </div>

        <div class="my-4 md:mx-4 shadow-md bg-gradient-to-t from-red-100 via-pink-100 to-red-100 shadow-lg rounded-lg">
            <div class="p-4">
                <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">Nome evento</h3>
                <p class="text-justify">Event description <br/> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint quibusdam quo eum quos unde? Eaque pariatur esse, atque cum modi vitae, id exercitationem sapiente non, error tempore reprehenderit eveniet magnam.</p>
                <div class="mt-5">
                    <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">prenota</a>
                </div>
            </div>
        </div>

        
    </div>

    <?php include_once __DIR__ . '/components/footer.php' ?>
    <script src="<?php __DIR__?> /res/js/functions.js"></script>
</body>
</html>