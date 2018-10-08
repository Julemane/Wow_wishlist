<?php
require_once('../app/class/Member.php');
require_once('../app/class/Item.php');
require_once('../app/controller/ItemsController.php');
require_once('../app/controller/MemberController.php');

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
    getItemData($_POST['itemId']);

  }else{
    echo "Aucun item sélectionné ! ";
  }
}
elseif($page === "creationUser"){
  require'../app/views/newUserView.php';
}
elseif ($page ==="newUser"){
  createMember("ptimimi","jimimi@hotmail.fr","120790");
}



