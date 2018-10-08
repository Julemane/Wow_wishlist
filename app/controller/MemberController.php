<?php

function createMember($nickname,$mail,$password){

  $member = new Member();
  $member->memberCreation($nickname,$mail,$password);

  if($member->available === false){
    echo'Pseudo deja utilisé';
  }else{
    echo'compte créer';
  }
}
