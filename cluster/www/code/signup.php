<?php 
    session_start();
    include_once __DIR__ . '/model/DAO/classes/connection.php';
    if(isset($_POST['submit'])){
      if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['pec']) || empty($_POST['password'])){
        $_SESSION['msg_txt'] = "Almeno un campo non é stato compilato correttamente.";
        $_SESSION['msg_type'] = "error";
      }
      else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $pec = trim($_POST['pec']);
        $validUsername = filter_var($username,FILTER_VALIDATE_REGEXP,["options" => ["regexp" => "/^[a-z\d_.]{4,20}$/i"]]);
        $pwdLenght=strlen($password);
        if(!$validUsername){
          $_SESSION['msg_txt'] = "Username non valida. Sono ammessi solo caratteri 
            alfanumerici, l'underscore e il punto. Lunghezza minima 5 caratteri.
            Lunghezza massima 20 caratteri";
          $_SESSION['msg_type'] = "warning";
        }
        elseif ($pwdLenght<3 && $pwdLenght > 20) {
          $_SESSION['msg_txt'] = "Password non valida. Lunghezza minima 8 caratteri.
            Lunghezza massima 20 caratteri";
          $_SESSION['msg_type'] = "warning";
        }
        else{
          try {
            $now = date("y-m-d h:i:s");
            include_once __DIR__ . '/model/DAO/classes/connection.php';
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "
              INSERT INTO agencies (date_created, username, password, PEC, name)
              VALUES (:date_created, :username, :password, :PEC, :name)";
            
            $conn = Connection::getConnection();
            $stm = $conn->prepare($query);
            
            $stm->bindParam(':date_created',$now, PDO::PARAM_STR);
            $stm->bindParam(':username', $username, PDO::PARAM_STR);
            $stm->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $stm->bindParam(':PEC', $_POST['pec'], PDO::PARAM_STR);
            $stm->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $stm->execute();
            header("Location: index.php");

            if ($stm->rowCount() > 0) :
                $_SESSION['msg_txt'] = "Registrazione eseguita con successo";
                $_SESSION['msg_type'] = "success";
                
            else :
                $_SESSION['msg_txt'] = "Si é verificato un problema con l'inserimento dei dati";
                $_SESSION['msg_type'] = "error";
                
                
            endif;
          } catch (PDOException $e) {
            $_SESSION['msg_txt'] = "Attenzione, l'utente non è stato registrato: " . $e->getMessage();
            $_SESSION['msg_type'] = 'error';
        }
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="<?php __DIR__ ?> /res/css/style.css" rel="stylesheet">

    <title>Media Way Spa - registrati</title>
</head>
<body class="">
    <?php include_once __DIR__ . '/components/navbar.php' ?>

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
/>
<div class="md:bg-gradient-to-r bg-gradient-to-b from-green-400 to-blue-100 rounded-2xl mb-10 flex mx-16 lg:mx-96 md:mx-80">
<div class="flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5">
<h1 class="font-bold text-2xl my-10 text-white"> Registrati </h1>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="mt-2 flex flex-col lg:w-1/2 w-8/12">
    <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
      <div class="flex -mr-px justify-center w-15 p-4">
        <span
          class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
        >
          <i class="fas fa-building"></i>
        </span>
      </div>
      <input
        type="text"
        name="name"
        class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
        placeholder="nome azienda"
      />
    </div>
    <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
      <div class="flex -mr-px justify-center w-15 p-4">
        <span
          class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
        >
          <i class="fas fa-user-circle"></i>
        </span>
      </div>
      <input
        type="text"
        class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
        placeholder="username"
        name="username"
      />
    </div>
    <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
      <div class="flex -mr-px justify-center w-15 p-4">
        <span
          class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
        >
          <i class="far fa-envelope"></i>
        </span>
      </div>
      <input
        type="text"
        class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
        placeholder="PEC"
        name="pec"
      />
    </div>
    <div class="flex flex-wrap items-stretch w-full relative h-15 bg-white items-center rounded mb-4">
      <div class="flex -mr-px justify-center w-15 p-4">
        <span
          class="flex items-center leading-normal bg-white rounded rounded-r-none text-xl px-3 whitespace-no-wrap text-gray-600"
          > 
          <i class="fas fa-lock"></i>
            </span
        >
      </div>
      <input
        id="passContainer"
        type="password"
        class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 px-3 relative self-center font-roboto text-xl outline-none"
        placeholder="password"
        name="password"
      />
      <div class="flex -mr-px">
        <span
          class="flex items-center leading-normal bg-white rounded rounded-l-none border-0 px-3 whitespace-no-wrap text-gray-600"
          >
          <i onclick="showPassword()" id="passToggle" class="fas fa-eye-slash"></i>
          </span>
      </div>
    </div>
    <input
      type="submit"
      name="submit"
      value="Registrati"
      class="bg-purple-600 font-semibold uppercase py-4 text-center px-17 md:px-12 md:py-4 text-white rounded-lg leading-tight text-xl md:text-base font-sans mt-4 mb-20"
    >
</input>
  </form>
  <?php
    if(isset($_SESSION['msg_type'])){
      echo($_SESSION['msg_txt']);
    }
  ?>
</div>















</div>

    <?php include_once __DIR__ . '/components/footer.php' ?>
    <script src="<?php __DIR__?> /res/js/functions.js"></script>
</body>
</html>