<?php
require_once('JsonConnect.php');
class Item{

      private $itemData;
      private $name;
      private $description;
      private $dropId;
      private $itemClass;
      private $imageBaseUrl = 'https:/render-eu.worldofwarcraft.com/icons/';
      private $imageExt = '.jpg';
      private $icon;


      function __construct($itemId){
        $jsonConnect = new JsonConnect();
        $apiReq = $jsonConnect->getItem($itemId);

        $this->itemData = json_decode($apiReq, true);
        $this->name = $this->itemData['name'];
        $this->description = $this->itemData['description'];
        $this->itemClass = $this->itemData['itemClass'];
        $this->icon = $this->itemData['icon'];
        $this->itemQuality = $this->itemData['quality'];

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
        $iconUrl =  strtolower($this->imageBaseUrl.$iconSize.'/'.$this->icon.$this->imageExt);
        return $iconUrl;
      }





}
