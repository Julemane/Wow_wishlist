
<?php ob_start(); ?>
<script>
$(document).ready(function(){

 let itemId = $('#itemId').text();
 ajaxGetStats(itemId);


});

</script>

<h2 id="itemName"><?php echo $itemData['name'];?></h2>
<ul>
  <li id="itemId"><?php echo $itemData['id'];?></li>
  <li id='itemImg'><img src="<?php echo $itemIcon;?>"></li>
    <?php
    if(!empty($itemData['description'])){
      ?>
  <li><?php echo $itemData['description'] ;?></li>;
      <?php
    }?>
  <li><?php echo $itemQuality;?></li>

</ul>
<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
