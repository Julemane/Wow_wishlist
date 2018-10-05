
<?php ob_start(); ?>

<script>
$(document).ready(function(){
//$('#itemId').hide();
 let itemId = $('#itemId').text();
 ajaxGetStats(itemId);

});

</script>
<div class="item">
  <div class="itemImg">
   <img id='itemImg' src="<?php echo $itemIcon;?>">
  </div>
  <div class="itemDetail">

    <h4 id="itemName"><?php echo $itemData['name'];?></h4>
    <ul id=itemStats>
      <li>Id de l'item :<span id="itemId"><?php echo $itemData['id'];?></span></li>
      <li id="itemLvl"></li>
      <li id="armor"></li>
      <li id="bind"></li>
      <li id="durability"></li>
      <li id="itemLvlRequiered"></li>

    </ul>
  </div>
  <div class="itemHover">
    <ul>
    <li></li>
    </ul>

  </div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
