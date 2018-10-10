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

    public function addMember($nickname, $mail, $passHash)
    {
      $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO members(nickname, mail, password) VALUES(:nickname, :mail, :password)');
              //On rempli la BDD avec les infos du formulaire
              $req->execute(array(

              'nickname' => $nickname,
              'mail' => $mail,
              'password' => $passHash));

    }



}
