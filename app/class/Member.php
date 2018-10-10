<?php
require_once('../app/model/UserManager.php');

class Member
{
  public $available;//Nickname status in DB
  public $nickname;
  public $mail;
  public $password;
  private $status;//Admin or member

   function __construct($nickname, $mail, $password){
    $req = new UserManager;
    $isAvailable = $req->checkNickname($nickname);
    //If nickname is  not Available
    if($isAvailable){
      $this->available = false;
    }else{
    //If nickname is Available
      $this->nickname = $nickname;
      $this->mail = $mail;
      $this->password = password_hash($password,PASSWORD_DEFAULT);
    }

  }

}
