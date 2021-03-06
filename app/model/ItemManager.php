<?php

require_once("Manager.php");

class ItemManager extends Manager
{

  public function itemSearch($search){
    $db = $this->dbConnect();
    $req = $db->query("SELECT id, item_name FROM items WHERE item_name LIKE '%$search%' ORDER BY id LIMIT 0,6");

    return $req;
  }
  public function checkItem($itemId, $member_id){
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT itemId, member_id FROM wishlist WHERE itemId = ? AND member_id = ?');
    $req->execute(array($itemId, $member_id));
    $item = $req->fetch();
    return $item['itemId'];
  }

  public function itemSave($itemId, $itemName, $member_id){
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO wishlist(itemId, itemName, member_id) VALUES( :itemId, :itemName, :member_id)');
    $req->execute(array(
              'itemId' => $itemId,
              'itemName' => $itemName,
              'member_id' => $member_id
            ));
  }

 public function getMemberWishlist($member_id){
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT itemId FROM wishlist WHERE member_id = ?');
    $req->execute(array($member_id));
    return $req;
  }

  public function itemDelete($itemId, $member_id){
    $db = $this->dbConnect();
    $req = $db->prepare("DELETE FROM wishlist WHERE itemId= ? AND  member_id = ?");
    $req->execute(array($itemId, $member_id));

  }


}
