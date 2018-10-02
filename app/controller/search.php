<?php

require_once('../model/ItemManager.php');

class Search
{

  public function getItem(){

    if(!empty($_POST) && !empty($_POST['search'])){
      extract($_POST);
      $search = strip_tags($search);

      $itemManager = new ItemManager();
      $req = $itemManager->itemSearch($search);

      //Si on a un resultat
      if($req->rowCount()>0){
        while($data = $req->fetch(PDO::FETCH_OBJ))
        {
          ?>
          <h2 onClick="itemChoice('<?php echo $data->item_name;?>','<?php echo $data->id;?>');"><?php echo $data->item_name;?></h2>
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

