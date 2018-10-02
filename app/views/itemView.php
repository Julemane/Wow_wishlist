<?php ob_start(); ?>

<h1>Hello</h1>
<h2><?php echo $itemData['name'];?></h2>
<ul>
  <li><?php echo $itemData['id'];?></li>
  <li><img src="<?php echo $itemIcon;?>"></li>
</ul>
<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
