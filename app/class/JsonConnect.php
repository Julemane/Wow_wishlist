<?php
class jsonConnect {

  public function getItem($itemId){

    if(isset($_COOKIE["userToken"])){
      $token = $_COOKIE["userToken"];
    }else{
      $token = $_SESSION['token'];
    }
    $curl = curl_init();
    $opts = [
      CURLOPT_URL => 'https://EU.api.blizzard.com/wow/item/'.$itemId.'?locale=fr_FR&access_token='.$token,
      CURLOPT_RETURNTRANSFER => true,
    ];
    curl_setopt_array($curl, $opts);
    $item = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Error:' . curl_error($ch);
        return false;
    }
    curl_close($curl);
    return $item;

  }

}
