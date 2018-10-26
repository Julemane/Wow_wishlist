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
    $itemAlreadySave = $itemManager->checkItem($itemId, $member_id);
    //If item exist in member's wishlist
    if($itemAlreadySave){
      $info = "Cet objet est déjà présent dans votre liste de souhait !";
      getWishlist($member_id, $info);
    }else{
    //We can save the item in the member list
    $itemToSave = $itemManager->itemSave($itemId, $itemName, $member_id);
    //Root to the wishlist whien item is added
      getWishlist($member_id);
    }


}

function getWishlist($member_id, $info = null){
   $itemManager = new ItemManager();
   $wishlist = $itemManager->getMemberWishlist($member_id);
   require'../app/views/userWishlistView.php';

}

function deleteItem($itemId, $member_id){
  $itemManager = new ItemManager();
  $item = $itemManager->itemDelete($itemId, $member_id);
  $info = "L'objet"." ".$itemId." "."a bien été supprimé de la liste.";
  getWishlist($member_id, $info);


}
