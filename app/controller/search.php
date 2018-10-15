<?php

require_once('../model/ItemManager.php');

class Search
{

  public function getItem(){

    if(!empty($_POST) && !empty($_POST['search'])){
      extract($_POST);

      $search = addslashes(strip_tags($search));


      $itemManager = new ItemManager();
      $req = $itemManager->itemSearch($search);

      //Si on a un resultat
      if(gettype($req) == 'object' && $req->rowCount()>0){
        while($data = $req->fetch(PDO::FETCH_OBJ))
        {
          ?>
          <h1 onClick="itemChoice('<?php echo addslashes($data->item_name);?>','<?php echo $data->id;?>');"><?php echo $data->item_name;?></h1>
          <?php
        }
      }
      else{
        echo '<h2>Aucun resultat</h2>';
      }
    }else{
      echo '<h2>Aucun resultat</h2>';
    }
  }

}

$search = new Search();
$itemsResult = $search->getItem();

