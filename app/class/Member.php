<?php
require_once('../app/model/UserManager.php');

class Member
{
  public $available;
  private $nickname;
  private $mail;
  private $password;
  private $status;

  public function memberCreation($nickname, $mail,$password){
    $req = new UserManager;
    $isAvailable = $req->checkNickname($nickname);
    //If nickname is  not Available
    if($isAvailable){
      $this->available = false;


    }else{
    //If nickname is Available
      $this->nickname = $nickname;
      $this->mail = $mail;
      $this->password = $password;
    }


  }

}
