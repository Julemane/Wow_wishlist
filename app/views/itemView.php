
<?php ob_start(); ?>

<div class="item">
  <div class="itemImg">
   <img id='itemImg' src="<?php echo $itemIcon;?>">
  </div>
  <div class="itemDetail">
    <h4 id="itemName"><?php echo $itemData['name'];?></h4>
    <ul id=itemStats>
      <li>Id de l'item :<span id="itemId"><?php echo $itemData['id'];?></span></li>
      <li id="itemLvl"></li>
      <li id="bind"></li>
      <li id="armor"></li>
      <!--Stats Bonus area-->
      <li id="durability"></li>
      <li id="itemLvlRequiered"></li>
    </ul>
  </div>
</div>

<script>
$(document).ready(function(){
 let itemId = $('#itemId').text();
 ajaxGetStats(itemId);
});
</script>

<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
