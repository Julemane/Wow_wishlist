<?php
class TokenGenerator
{
  private $token;
  private $clientId = "de1d0fadeb8543fda493243bd76ec882";
  private $clientSecret = "A4UhkdTKv58CYzzDXY3x00AnZIVpbb7C";

  //Create token for the User
  function __construct(){
  $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://eu.battle.net/oauth/token");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_USERPWD, $this->clientId.":".$this->clientSecret);
      $headers = array();
      $headers[] = "Content-Type: application/x-www-form-urlencoded";
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      $result = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
          return false;
      }
      curl_close($ch);
      $data = json_decode($result, true);
      $this->token = $data["access_token"];
  }

  //return token value
  public function getToken(){
    return $this->token;
  }



}
