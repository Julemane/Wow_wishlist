<?php

function getItemData($itemId){
  //Creation d'une instance de la classe Item
    $itemStats = new Item($itemId);
    $itemData = $itemStats->getData();
    $itemIcon = $itemStats->getIcon();
    $itemQuality = $itemStats->getItemQuality();

    require'../app/views/itemView.php';
}

