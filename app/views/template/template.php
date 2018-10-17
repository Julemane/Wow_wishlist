<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <head>
    <title>WoW Wishlist</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/itemStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>


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
    <!--Dynamic Php content Area-->
    <section class="content row">
      <div class="col-lg-12">
        <?= $content ?>
      </div>
    </section>
  </body>
</html>
