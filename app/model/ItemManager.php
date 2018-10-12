<?php

require_once("Manager.php");

class ItemManager extends Manager
{

  public function itemSearch($search){
    $db = $this->dbConnect();
    $req = $db->query("SELECT id, item_name FROM items WHERE item_name LIKE '%$search%' ORDER BY id LIMIT 0,6");

    return $req;
  }

  public function itemSave($itemId, $itemName, $nickname){
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO wishlist(itemId, itemName, nickname) VALUES( :itemId, :itemName, :nickname)');
    $req->execute(array(
              'itemId' => $itemId,
              'itemName' => $itemName,
              'nickname' => $nickname
            ));
  }


}
