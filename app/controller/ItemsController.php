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

    echo $itemId;
    echo $itemName;
    echo $member_id;

}

