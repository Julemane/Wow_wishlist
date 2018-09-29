<?php

require '../app/Autoloader.php';
//gère l'autoloading
App\Autoloader::register();

if(isset($_GET['page'])){
  $page = $_GET['page'];
} else{
  $page = 'home';
}

//Si param URL  = home
//on envoi sur la vue Home
if($page === 'home'){
    require'../app/pages/home.php';
}
