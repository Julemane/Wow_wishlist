<?php

//Create Cookie with token key for API request
function generateTokenCookie(){
  $cookieToken = new TokenGenerator();
  var_dump($cookieToken);
  //Token expire every 24h - 10s
  setcookie("userToken", $cookieToken->getToken(), time() + (86350), "/");
  //User accept Cookie for 30 days
  setcookie("cookieAccept", true, time() + (86400*30),"/" );
}

function generateTokenSession(){
  $sessionToken = new TokenGenerator();
  $_SESSION['token'] = $sessionToken->getToken();
}

function createMember($nickname,$mail,$password){

  $member = new Member();
  $checkNickname = $member->memberCreation($nickname,$mail,$password);
  try{
    if($member->available === false){
      throw new Exception('Le pseudo'.' '.$nickname.' '.'est deja utilisé ! ');
    }else{
      $pushMember = new UserManager();
      $newMember = $pushMember->addMember($member->nickname, $member->mail, $member->password, $member->status);
      //Member automatically logged when he create account
      //Login the User and setting the session var
      $member = new Member();
      $member->memberAuth($nickname);
      $_SESSION['nickname'] = $member->nickname;
      $_SESSION['status'] = $member->status;
      $_SESSION['member_id'] = $member->member_id;
      header('Location: ?page=home');
    }
  }
  catch(Exception $e){

    $unavailable =  $e->getMessage();
    $mail = $mail;
    require'../app/views/newUserView.php';
  }
}


function memberLogin($nickname, $password){
  $member = new Member();
  $member->memberAuth($nickname);
  try{
    //If available = false member exist
    if(!$member->available){
      $isPasswordCorrect = password_verify($password, $member->password);
        if($isPasswordCorrect){
          //set the session var
          $_SESSION['nickname'] = $member->nickname;
          $_SESSION['status'] = $member->status;
          $_SESSION['member_id'] = $member->member_id;
          header('Location: ?page=home');

        }else{
          throw new Exception('Mauvais utilisateur ou mot de passe !');
        }

    }else{
      throw new Exception('Mauvais utilisateur ou mot de passe !');
    }
  }
  catch(Exception $e){

    $loginError =  $e->getMessage();
    require'../app/views/home.php';
  }

}

function memberLogOut(){

  session_destroy ();
     header('Location: ?page=home');
}
