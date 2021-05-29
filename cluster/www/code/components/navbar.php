<?php if(isset($_SESSION['user_id'], $_SESSION['username'])){
  $logged = true;
}
else{
  $logged=false;
}
?>

<nav class="z-50 sticky top-2 md:bg-gradient-to-r bg-gradient-to-b from-green-400 to-blue-100 shadow-2xl rounded-lg md:rounded-full m-10" role="navigation">
  
  <div class="container mx-auto p-4 flex flex-wrap items-center md:flex-no-wrap">
    <div class="mr-4 md:mr-8">
      <a href="/" rel="home">
        <svg class="w-10 h-10 text-purple-600" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
          <title>Media Way SPA</title>
          <path fill="currentColor" d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"></path>
        </svg> <!--<p>Media Way SPA</p>-->
      </a>
    </div>
    <div class="ml-auto md:hidden">
      <button class="flex items-center px-3 py-2 border rounded" type="button" onclick="toggle()">
        <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
        </svg>
      </button>
    </div>


    <div id="nav-items" class="nav-list w-full md:w-auto md:flex-grow md:flex md:items-center">
      <ul class="flex flex-col mt-4 -mx-4 pt-4 border-t md:flex-row md:items-center md:mx-0 md:ml-auto md:mt-0 md:pt-0 md:border-0">
        <li>
            <a class="block px-4 py-1 md:p-2 lg:px-4 uppercase text-purple-600" href="about-us.php" title="about us">chi siamo</a>
        </li>
        <?php if(!$logged):?>
        <li>
          <a class="block px-4 py-1 md:p-2 lg:px-4 uppercase text-purple-600" href="login.php" title="Sign in">accedi</a>
        </li>
        <li>
          <a class="m-2 btn block px-4 py-1 md:p-2 lg:px-4 bg-purple-600 rounded-lg text-white font-semibold uppercase" href="signup.php" title="Sign up">registrati</a>
        </li>
        <?php else:?>
          <li>
          <a class="m-2 btn block px-4 py-1 md:p-2 lg:px-4 bg-purple-600 rounded-lg text-white font-semibold uppercase" href="logout.php" title="Log out">logout</a>
        </li>
        <?php endif;?>
      </ul>
    </div>
  </div>
</nav>