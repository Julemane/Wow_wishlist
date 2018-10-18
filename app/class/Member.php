<?php
require_once('../app/model/UserManager.php');

class Member
{
  public $available;//Nickname status in DB
  public $nickname;
  public $mail;
  public $password;
  public $member_id;
  public $status;

   public function memberCreation($nickname, $mail, $password){
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
      $this->status = 'Member';

    }
  }

    public function memberAuth($nickname){
      $req = new UserManager();
      $member = $req->getMember($nickname);
      if($member){
        //rempli les variable de l'objet avec les valeur du tableau retourné par le model UserManager
        $this->nickname = $member['nickname'];
        $this->mail = $member['mail'];
        $this->password = $member['password'];
        $this->member_id = $member['id'];
        $this->available = false;

      }else{
        $this->available = true;
      }

    }

    public function createAdmin(){
      $this->status = "Administrateur";
    }


}
