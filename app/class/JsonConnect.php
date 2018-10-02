<?php

class jsonConnect {

  public function getItem($itemId){

    $url = 'https://eu.api.battle.net/wow/item/'.$itemId.'?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3';
    $item = file_get_contents($url);

    $data = array(
      'item'=> $item,
      'url'=> $url
    );
    return $data;
  }

}
