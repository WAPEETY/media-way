<?php 
    session_start();
    
    if (isset($_SESSION['user_id'], $_SESSION['username'])) :
        
        header("Location: ../index.php");
    endif;

    if (isset($_POST['login_btn'])) :

      if (empty($_POST['username']) || empty($_POST['password'])) :
          $_SESSION['msg_txt'] = "Inserisci username e password.";
          $_SESSION['msg_type'] = "error";
      else :
          
          $username = trim($_POST['username']);
          $password = trim($_POST['password']);
          
          try {
            include_once __DIR__ . '/model/DAO/classes/connection.php';
              $sql = "
                  SELECT * 
                  FROM agencies 
                  WHERE username = :username";
              $conn = Connection::getConnection();

              $stm = $conn->prepare($sql);
              $stm->bindParam(':username', $username, PDO::PARAM_STR);
              $stm->execute();
  
              $record = $stm->fetch(PDO::FETCH_ASSOC);
              
              if (!$record || password_verify($password, trim($record['password'])) === false) {
                  $_SESSION['msg_txt'] = "Credenziali utente errate.";
                  $_SESSION['msg_type'] = "error";
                  $logged = true;
              } else {
                  session_regenerate_id();
                  $_SESSION['user_id'] = $record['id'];
                  $_SESSION['username'] = $username;
  
                  header('Location: ../index.php');
                  exit;
              }
          } catch (PDOException $e) {
              $_SESSION['msg_txt'] = 'Errore sul server: ' . $e->getMessage();
              $_SESSION['msg_type'] = 'error';
          }
      endif;
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

    <title>Media Way Spa - login</title>
</head>
<body class="">
    <?php include_once __DIR__ . '/components/navbar.php' ?>

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
/>
<div class="md:bg-gradient-to-r bg-gradient-to-b from-green-400 to-blue-100 rounded-2xl mb-10 flex mx-16 lg:mx-96 md:mx-80">
<div class="flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5">
<h1 class="font-bold text-2xl my-10 text-white"> Login </h1>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="mt-2 flex flex-col lg:w-1/2 w-8/12">
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
    <a href="#" class="text-base text-white text-right font-roboto leading-normal hover:underline mb-6">Password dimenticata?</a>
    <input
      name="login_btn"
      type="submit"
      class="bg-purple-600 font-semibold uppercase py-4 text-center px-17 md:px-12 md:py-4 text-white rounded-lg leading-tight text-xl md:text-base font-sans mt-4 mb-20"
    >
      Login
</input>
  </form>
</div>















</div>

    <?php include_once __DIR__ . '/components/footer.php' ?>
    <script src="<?php __DIR__?> /res/js/functions.js"></script>
</body>
</html>