<?php

function createMember($nickname,$mail,$password){

  $member = new Member($nickname,$mail,$password);

  if($member->available === false){
    echo'Pseudo deja utilisé';
  }else{

    $pushMember = new UserManager();
    $newMember = $pushMember->addMember($member->nickname, $member->mail, $member->password);

    echo'bravo'." ".$member->nickname." ".'votre compte a été créer avec succès !';
  }
}
