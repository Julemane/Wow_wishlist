
<?php ob_start(); ?>

<div id="itemArea" class="col-lg-6 col-md-8">
  <div class="row">
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
  <div id="button-group" class="row">
    <div id="itemButtons">
      <a href="?page=home"><button type="button" class="btn btn-dark">Retour à la recherche</button></a>
    <?php if(isset($_SESSION['nickname'])){
      ?>
      <form action="?page=saveItem&amp;itemId=<?php echo $itemData['id'];?>&amp;itemName=<?php echo $itemData['name'];?>" method="POST">
        <button type="submit" class="btn btn-primary">Ajouter à ma liste</button>
      </form>
      <?php
      }
    ?>
    </div>
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
