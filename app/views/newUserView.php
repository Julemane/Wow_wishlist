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
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
         if (form.checkValidity() === false){
          event.preventDefault();
          event.stopPropagation();
        }
        else if(password1.value != password2.value){
            validatePassword(event);
          }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
var password1 = document.getElementById('password1'), password = document.getElementById('password2');

function validatePassword(event){
  if(password1.value != password2.value){
  event.preventDefault();
  event.stopPropagation();
  password2.classList.add('is-invalid');
  password2.style.borderColor = "#dc3545";
  }else{
    password2.classList.add('was-validated');
    password2.classList.remove('is-invalid');
    password2.style.borderColor = "";
  }
}
password1.onchange = validatePassword;
password2.onkeyup = validatePassword;

</script>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>
