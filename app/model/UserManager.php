<?php
require_once('Manager.php');

class userManager extends Manager
{

   public function checkNickname($nickname)
    {
      $db = $this->dbConnect();
      //requete retourne 1 si pseudo existe
      $req = $db->prepare('SELECT COUNT(*) AS nickname FROM members WHERE nickname = ?');
      $req->execute(array($nickname));
      $nickname = $req->fetch();
      return $nickname['nickname'];
    }


}
