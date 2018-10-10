<?php
require_once('../app/class/Member.php');
require_once('../app/class/Item.php');
require_once('../app/controller/ItemsController.php');
require_once('../app/controller/MemberController.php');

if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 'home';
  }

try{

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
    if (isset($_POST['nickname']) && !empty($_POST['nickname'])
                  && isset($_POST['mail']) && !empty($_POST['mail'])
                  && isset($_POST['password']) && !empty($_POST['password'])
                  && isset($_POST['password2']) && !empty($_POST['password2'])){
      createMember($_POST['nickname'],$_POST['mail'],$_POST['password']);
  }else
  echo "tous les champs ne sont pas remplis !";

  }
}

//Gestion des erreurs
catch(Exception $e) {
    ob_start();
    ?>

    <div id="errorPage">
        <p><?php  echo 'Erreur : ' . $e->getMessage(); ?></p>
        <p><a href="index.php">Retour à l'accueil</a></p>
    </div>

    <?php
    $content = ob_get_clean();

    require('../app/views/template/template.php');

}


