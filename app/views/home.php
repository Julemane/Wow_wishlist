<?php ob_start(); ?>

<div id="searchArea" class="col-lg-8">

  <form action="?page=itemStats" method="post" autocomplete="off">

    <label for="search">Rechercher:</label>
    <input type="text" name="search" id="search" />
    <input id="itemId" name="itemId" type="hidden" />

    <input type="submit" id="send"/>

    <div class="loader"></div>
  </form>


<div id="result"></div>
<?php $content = ob_get_clean(); ?>


<?php require('template/template.php'); ?>
