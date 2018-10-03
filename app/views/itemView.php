
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

    <h2 id="itemName"><?php echo $itemData['name'];?></h2>
    <ul id=itemStats>
      <li id="itemId"><?php echo $itemData['id'];?></li>
        <?php
        if(!empty($itemData['description'])){
          ?>
      <li><?php echo $itemData['description'] ;?></li>;
          <?php
        }?>
      <li id="itemLvl"></li>
      <li id="armor"></li>
      <li id="bind"></li>
      <li id="durability"></li>
      <li id="itemLvlRequiered"></li>




    </ul>
  </div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
