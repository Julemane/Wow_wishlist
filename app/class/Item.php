<?php
require_once('JsonConnect.php');
class Item{

      private $itemData;
      private $name;
      private $description;
      private $dropId;
      private $itemClass;
      private $imageBaseUrl = 'http://media.blizzard.com/wow/icons/';
      private $imageExt = '.jpg';
      private $icon;
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
        $this->icon = $this->itemData['icon'];
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
      //choose Icon size 18/36/56
      public function getIcon($iconSize = 56){
        $iconUrl =  strtolower('http://media.blizzard.com/wow/icons/'.$iconSize.'/'.$this->icon.$this->imageExt);
        return $iconUrl;
      }


}
