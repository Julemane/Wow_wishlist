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

elseif($page === 'itemStats'){
  if(isset($_POST['itemId'])){
    require'../app/controller/itemStats.php';
  }else{
    echo "Aucun item sélectionné ! ";
  }
}
