<?php
require_once('../Database.php');

if(!empty($_POST) && !empty($_POST['search']))
{
  extract($_POST);
  $search = strip_tags($search);

$db = new Database('wow-wishlist');
$req = $db->query("SELECT id, item_name FROM items WHERE item_name LIKE '%$search%' ORDER BY id LIMIT 0,6");

  //Si on a un resultat
  if($req->rowCount()>0)
  {
    while($data = $req->fetch(PDO::FETCH_OBJ))
    {
      ?>
      <h2 onClick="itemChoice('<?php echo $data->item_name;?>','<?php echo $data->id;?>');"><?php echo $data->item_name;?></h2>
      <?php
    }
  }
  else
  {
    echo '<h2>Aucun resultat</h2>';
  }
}

else
{
  echo '<h2>Aucun resultat</h2>';
}

?>
