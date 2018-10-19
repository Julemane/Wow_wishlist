<?php
while($item = $wishlist->fetch()){
  echo $item['itemId'].'</br>';
}
