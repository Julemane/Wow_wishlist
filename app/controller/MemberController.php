<?php
session_start();

function createMember($nickname,$mail,$password){

  $member = new Member();
  $checkNickname = $member->memberCreation($nickname,$mail,$password);

  if($member->available === false){
    echo'Pseudo deja utilisé';
  }else{
    $pushMember = new UserManager();
    $newMember = $pushMember->addMember($member->nickname, $member->mail, $member->password, $member->status);

    echo'bravo'." ".$member->nickname." ".'votre compte a été créer avec succès !';
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
          header('location:index.php');

        }else{
          throw new Exception('Mauvais utilisateur ou mot de passe !');
        }

    }else{
      throw new Exception('Mauvais utilisateur ou mot de passe !');
    }
  }
  catch(Exception $e){
    echo $e->getMessage();
  }


}
