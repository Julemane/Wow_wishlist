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
      private $itemQuality;
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

      public function getItemQuality(){
          switch($this->itemQuality){
            case 0:
                return "Basse qualité";
                break;
            case 1 :
                return "Qualité normale";
                break;
            case 2:
                return "Commun";
                break;
            case 3 :
                return "Rare";
                break;
            case 4:
                return "Épique";
                break;
            case 5 :
                return "Légendaire";
                break;
          }


      }


}
