<?php ob_start(); ?>
<div id="userListArea" class="col-lg-10">
  <table id="wishlist" class="table table-responsive-xl table-dark">
  <tbody>
    <?php
      while($item = $wishlist->fetch()){
echo '<tr class="item' . $item['itemId'] . '">'; ?>
       <td><img class='itemImg'/></td>
       <td class="itemId"><?php echo $item['itemId']; ?></td>
       <td class="itemName"></td>
       <td><a href="?page=deleteItem&amp;itemId=<?php echo $item['itemId']; ?>"><button class="btn btn-light" type="button" onclick="return confirm('Etes vous sur de vouloir supprimer cet objet ?')">Supprimer</button></a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<p>
<?php if(isset($info)){
    echo $info;
  }
  ?>
</p>
<!--Area appear hover IMG-->
<div id="itemDetailList">
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

<script>

$(document).ready(function(){
  let itemIdElt = document.getElementsByClassName("itemId");

  [...itemIdElt].forEach(function(elt){
    getItemsStats(elt.innerHTML);
  })

});
</script>

<?php $content = ob_get_clean(); ?>
<?php require('template/template.php'); ?>
