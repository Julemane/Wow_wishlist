<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <head>
    <title>WoW Wishlist</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
    <script type="application/javascript" src="js/search.js"></script>
  </head>
  <body>
    <div id="content">

      <form action="itemDetail.php" method="post">

        <label for="search">Rechercher:</label>
        <input type="text" name="search" id="search" />
        <input id="itemId" name="itemId" type="hidden" />

        <input type="submit" id="send"/>

        <div class="loader"></div>
      </form>


      <div id="result"></div>

    </div>
  </body>
</html>
