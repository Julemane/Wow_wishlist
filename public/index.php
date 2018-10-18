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
      throw new Exception("Aucun item sélectionné ! ");
      ;
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
  throw new Exception("tous les champs ne sont pas remplis !");

  }
  elseif($page ==="login"){
    if(isset($_POST['userPassword']) && !empty($_POST['userPassword'])
      && isset($_POST['userNickname'])&& !empty($_POST['userNickname'])){

        memberLogin($_POST['userNickname'],$_POST['userPassword'] );

    }else{
      throw new Exception("tous les champs ne sont pas remplis");

    }
  }
  elseif($page === "saveItem"){
    if(isset($_GET['itemId']) && !empty($_GET['itemId']) &&
        isset($_GET['itemName']) && !empty($_GET['itemName'])){
      saveItem($_GET['itemId'], $_GET['itemName'], $_SESSION['member_id']);

    }else{
      throw new Exception("pas d'item selectionné");
    }

  }
  elseif ($page === 'logout'){
        memberLogOut();
  }
}

//Gestion des erreurs
catch(Exception $e) {
    ob_start();
    ?>

    <div id="error">
        <p><?php  echo 'Erreur : ' . $e->getMessage(); ?></p>
        <p><a href="index.php">Retour à l'accueil</a></p>
    </div>

    <?php
    $content = ob_get_clean();

    require('../app/views/template/template.php');

}


