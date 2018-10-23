<?php ob_start(); ?>

<div id="searchArea" class="col-lg-10">


  <form  class="form-inline" action="?page=itemStats" method="post" autocomplete="off">
    <div class="col-lg-8">
      <input type="text" name="search" id="search"  placeholder="Nom de l'item"/>
    </div>
    <input id="itemId" name="itemId" type="hidden" />
    <div class="col-lg-4">
      <input type="submit" value="Voir l'objet" id="send"/>
    </div>
    <div class="loader"></div>
  </form>
  <div id="result"></div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
