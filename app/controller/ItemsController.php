<?php

require_once('../app/model/ItemManager.php');

function getItemData($itemId){
  //Creation d'une instance de la classe Item
    $itemStats = new Item($itemId);
    $itemData = $itemStats->getData();
    $itemIcon = $itemStats->getIcon();

    require'../app/views/itemView.php';
}

function saveItem($itemId, $itemName, $member_id){

    $itemManager= new ItemManager();
    $itemToSave = $itemManager->itemSave($itemId, $itemName, $member_id);
    //Root to the wishlist whien item is added
    header('Location: ?page=wishlist');

}

function getWishlist($member_id){
   $itemManager = new ItemManager();
   $wishlist = $itemManager->getMemberWishlist($member_id);

  require'../app/views/userWishlistView.php';

}

