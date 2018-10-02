<?php
require_once('JsonConnect.php');
class Item{

      private $itemData;
      private $name;
      private $description;
      private $icon;
      private $dropId;
      private $itemClass;
      public $itemUrl;


      function __construct($itemId){
        $jsonConnect = new JsonConnect();
        $apiReq = $jsonConnect->getItem($itemId);
        $this->itemUrl = $apiReq['url'];
        //var_dump($apiReq['url']);

        $this->itemData = json_decode($apiReq['item'], true);
        $this->name = $this->itemData['name'];
        $this->description = $this->itemData['description'];
        $this->itemClass = $this->itemData['itemClass'];
      }
      //return all Item's data
      public function getData(){
        return $this->itemData;
      }
      //return Item Name
      public function getItemName(){
        return $this->name;
      }

      public function getDescription(){
        return $this->description;
      }

      public function getItemClass(){
        return $this->itemClass;
      }


}
