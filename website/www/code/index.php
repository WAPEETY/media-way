<?php 
    $GLOBALS['debug']=false;
    include_once __DIR__ . '/model/DAO/classes/connection.php';
    $conn = Connection::getConnection();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <title>Media Way Spa</title>
</head>
<body>
    <?php include_once __DIR__ . '/components/navbar.php' ?>
</body>
</html>