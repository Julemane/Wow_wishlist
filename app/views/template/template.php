<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <head>
    <title>WoW Wishlist</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/itemStyle.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>

   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

    <script type="application/javascript" src="js/accountCreation.js"></script>
    <script type="application/javascript" src="js/search.js"></script>
    <script type="application/javascript" src="js/item.js"></script>
  </head>
  <body class="container">
    <header class="row">
      <img src="images/banner.jpg" alt="banniere représentant les différentes extensions de Wow"/>

    </header>
    <section id="userArea"class="row d-flex align-items-center">
      <?php
      if(isset($_SESSION['nickname'])){
        ?>
          <div class="col-lg-12" id="loggedUser">
            <h2>Hello <?php echo $_SESSION['nickname']; ?></h2>
            <div>
              <a href="?page="><button type="button" class="btn btn-dark">Liste de souhait</button></a>
              <a href="?page=logout"><button type="button" class="btn btn-dark">Déconnexion</button></a>
            </div>
          </div>

        <?php
      }else{
        include("../app/views/include/login.php");
        include("../app/views/include/accountCreation.php");
      }
      ?>
    </section>


    <section class="content row">
      <div class="col-lg-12">
        <?= $content ?>
      </div>
    </section>
  </body>
</html>
