<?php

if(isset($_GET['page'])){
  $page = $_GET['page'];
} else{
  $page = 'home';
}

//Si param URL  = home
//on envoi sur la vue Home
if($page === 'home'){
    require'../app/views/home.php';
}

if($page === 'itemStats'){
  if(isset($_POST['itemId'])){
    require'../app/controller/itemStats.php';
  }else{
    echo "pas d'item selctionner";
  }
}
