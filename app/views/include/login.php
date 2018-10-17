 <!--Login Area-->
<div class="col-lg-7" id="login">
  <form action="?page=login" method="post">
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" id="userNickname" placeholder="Votre Pseudo" name="userNickname" required>
      </div>
      <div class="col">
         <input type="password" class="form-control" id="userPassword" placeholder="Mot de passe" name="userPassword" required>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-dark">Se connecter</button>
        </div>
      </div>
    </form>
    <!--Error message if nickname or password incorect -->
     <?php
      if(isset($loginError)){
         echo $loginError;
      }
      ?>
</div>
