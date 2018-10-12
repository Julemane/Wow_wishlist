<?php
require_once('Manager.php');

class UserManager extends Manager
{

   public function checkNickname($nickname)
    {
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT COUNT(*) AS nickname FROM members WHERE nickname = ?');
      $req->execute(array($nickname));
      $nickname = $req->fetch();
      return $nickname['nickname'];
    }

    public function addMember($nickname, $mail, $passHash, $status)
    {
      $db = $this->dbConnect();
      $req = $db->prepare('INSERT INTO members(nickname, mail, password, status) VALUES(:nickname, :mail, :password, :status)');
              //On rempli la BDD avec les infos du formulaire
      $req->execute(array(
              'nickname' => $nickname,
              'mail' => $mail,
              'password' => $passHash,
              'status' => $status));
    }

    public function getMember($nickname){
      $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, nickname, password, mail FROM members WHERE nickname = :nickname');
        $req->execute(array('nickname' => $nickname));
        $member = $req->fetch();
        return $member;
    }




}
