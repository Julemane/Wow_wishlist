<?php
require_once('../app/model/itemManager.php');

function getItemData($itemId){
  //Creation d'une instance de la classe Item
    $itemStats = new Item($itemId);
    $itemData = $itemStats->getData();
    $itemIcon = $itemStats->getIcon();

    require'../app/views/itemView.php';
}

function saveItem($itemId, $itemName, $nickname){

    $itemManager= new ItemManager();
    $itemToSave = $itemManager->itemSave($itemId, $itemName, $nickname);

    echo $itemId;
    echo $itemName;
    echo $nickname;

}

