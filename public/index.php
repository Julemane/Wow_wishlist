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
      getItemData(htmlspecialchars($_POST['itemId']));

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
        if($_POST['password'] == $_POST['password2']){
          createMember(htmlspecialchars($_POST['nickname']),htmlspecialchars($_POST['mail']),htmlspecialchars($_POST['password']));
        }else{
          throw new Exception("Vos mots de passes ne correspondent pas !");
        }

  }else
  throw new Exception("tous les champs ne sont pas remplis !");

  }
  elseif($page ==="login"){
    if(isset($_POST['userPassword']) && !empty($_POST['userPassword'])
      && isset($_POST['userNickname'])&& !empty($_POST['userNickname'])){

        memberLogin(htmlspecialchars($_POST['userNickname']),htmlspecialchars($_POST['userPassword']));

    }else{
      throw new Exception("tous les champs ne sont pas remplis");

    }
  }
  elseif($page === "saveItem"){
    if(isset($_GET['itemId']) && !empty($_GET['itemId']) &&
        isset($_GET['itemName']) && !empty($_GET['itemName'])){
      saveItem(htmlspecialchars($_GET['itemId']), htmlspecialchars($_GET['itemName']), $_SESSION['member_id']);

    }else{
      throw new Exception("pas d'item selectionné");
    }

  }
  elseif ($page === "wishlist"){
    if(isset($_SESSION['member_id'])){
      getWishlist($_SESSION['member_id']);

    }else{
      throw new Exception("Vous devez être connecté pour accéder à votre liste de souhaits");
    }
  }
  elseif($page === "deleteItem"){
    if(isset($_GET['itemId']) && isset($_SESSION['member_id'])){
     deleteItem($_GET['itemId'], $_SESSION['member_id']);
    }
    else{
      throw new Exception("Vous devez être connecté pour accéder à votre liste de souhaits");
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


