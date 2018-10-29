<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Projet étudiant Openclassrooms. Application de création de listes de souhaits d'objets pour World of Warcraft">
    <meta name="author" content="Jérémy Hennebique">

    <meta property="og:image" content="http://wow-wishlist.jeremy-hennebique.com/public/images/banner.jpg" />
    <meta property="og:url" content="http://wow-wishlist.jeremy-hennebique.com/public/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="World of Warcraft wishlist" />
    <meta property="og:description" content="Projet étudiant Openclassrooms. Application de création de listes de souhaits d'objets pour World of Warcraft" />
    <!--Vcard twitter-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="World of Warcraft wishlis" />
    <meta name="twitter:creator" content="Jérémy Hennebique" />

    <!--Favincon-->
    <link rel="icon" href="images/favicon.png">

    <!--Local CSS-->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/itemStyle.css" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <!--Jquery 3.3.1-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!--Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <!--LOCAL JS-->
    <script src="js/formControl.js"></script>
    <script src="js/search.js"></script>
    <script src="js/itemStats.js"></script>
    <script src="js/wishlist.js"></script>
    <script src="js/jquery.dataTables.js">
  </script>

    <title>WoW Wishlist</title>

  </head>
  <body class="container">
    <header class="row">
      <a href="?page=home"><img class="img-fluid" src="images/banner.jpg" alt="banniere représentant les différentes extensions de Wow"/></a>
    </header>
    <div id="userArea" class="row d-flex align-items-center">
      <?php
      if(isset($_SESSION['nickname'])){
        ?>
          <div class="col-xl-12" id="loggedUser">
            <h2>Hello <?php echo $_SESSION['nickname']; ?></h2>
            <div class="form-inline" >
              <form action="?page=wishlist" method="post"><button type="submit" class="btn btn-dark">Liste de souhait</button></form>
              <form action="?page=logout" method="post"><button type="submit" class="btn btn-dark">Déconnexion</button></form>
            </div>
          </div>

        <?php
      }else{
        include("../app/views/include/login.php");
        include("../app/views/include/accountCreation.php");
      }
      ?>
    </div>
    <!--Dynamic Php content Area-->
    <div class="content row">
      <div class="col-xl-12">
        <?= $content ?>
      </div>
    </div>
    <footer class="row">
      <p>World of Warcraft® and Blizzard Entertainment® are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. These terms and all related materials, logos, and images are copyright © Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment®.</p>
      <p>Site web réalisé par Jérémy Hennebique dans le cadre du projet étudiant libre de la formation Openclassrooms développeur Web.</p>


    </footer>
  </body>
</html>
