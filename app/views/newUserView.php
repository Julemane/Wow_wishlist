<?php ob_start(); ?>
<div id="newAccountArea" class="col-lg-10">

<form class="needs-validation" action="?page=newUser" method="post" novalidate>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="nickname">Pseudo</label>
      <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Entrez votre pseudo"  required>
      <div class="invalid-feedback">
        Pseudo requis
      </div>
      <!--If nickname already exist in DB-->
      <div id="unavailable">
       <?php
        if(isset($unavailable)){
         echo $unavailable;
        }
      ?>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="mail">Votre Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
      <input type="email" class="form-control" id="mail" name="mail"placeholder="Votre Email"
      value="<?php if(isset($mail)){echo $mail;}?>" required>
      <div class="invalid-feedback">
       Adresse email valide requise
      </div>
    </div>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-4">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control"  name="password" id="password1" placeholder="Mot de passe" required>
      <div class="invalid-feedback">
        Vous devez choisir un mot de passe
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <label for="password">Confirmez mot de passe</label>
      <input type="password" class="form-control" id="password2" name="password2"placeholder="Retapez votre mot de passe" required>
      <div class="invalid-feedback">
        Vous devez confirmez votre mot de passe
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-4">
      <button class="btn btn-primary" type="submit">Créer mon compte</button>
    </div>
  </div>
</form>

<script>
  window.addEventListener('load',formControl());
</script>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>
