<?php ob_start(); ?>

<div id="userListArea" class="col-lg-10">

<table id="wishlist" class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
       <th scope="col">Img</th>
      <th scope="col">Id de l'item</th>
      <th scope="col">Nom</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($item = $wishlist->fetch()){
    ?>
    <!--Area appear hover IMG-->
    <div class="itemDetailList">
      <h4 id="itemName"></h4>
      <ul id=itemStats>
        <li id="itemLvl"></li>
        <li id="bind"></li>
        <li id="armor"></li>
        <!--Stats Bonus area-->
        <li id="durability"></li>
        <li id="itemLvlRequiered"></li>
      </ul>
    </div>
    <tr>
      <th scope="row">Id</th>
      <th id="itemImg">Img</th>
      <td class="itemId"><?php echo $item['itemId']; ?></td>
      <td>ItemName</td>
      <td>Supprimer</td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>

<script>
let wishlistTable = document.getElementById('wishlist');

$(document).ready(function(){
  for( i=1;i<wishlistTable.rows.length;i++){
    let itemId = (wishlistTable.rows[i].cells[2]).innerHTML;
    ajaxGetStats(itemId);
  }

});

</script>
<?php $content = ob_get_clean(); ?>
<?php require('template/template.php'); ?>
