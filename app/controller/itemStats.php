<?php
// Doit se connecter a l'API avec l'id et retourner les infos de l'item puis renvoyer vers la vue pour mise en forme

$itemId = $_POST['itemId'];

   $url = 'https://eu.api.battle.net/wow/item/'.$itemId.'?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3';
   $itemData = file_get_contents($url);
  $test = json_decode($itemData, true);


var_dump($test);
