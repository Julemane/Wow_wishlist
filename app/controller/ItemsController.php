<?php

function getItemData($itemId){
  //Creation d'une instance de la classe Item
    $itemStats = new Item($itemId);
    $itemData = $itemStats->getData();
    var_dump($itemData);
}

