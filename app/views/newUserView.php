<?php ob_start(); ?>
<div id="newAccountArea" class="col-lg-10">

  <form id="newUserForm" action="?page=newUser" method="post">
      <div class="form-group">
        <label for="nickname">Pseudo</label>
        <input type="text" class="form-control" id="nickname" aria-describedby="emailHelp" placeholder="Entrez votre pseudo" name="nickname" required>
      </div>
      <div class="form-group">
        <label for="mail">Votre Email</label>
        <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" name="mail" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password1" placeholder="Azerty123" name="password" required>
      </div>
      <div class="form-group">
        <label for="password2">Confirmez votre mot de passe</label>
        <input type="password" class="form-control" id="password2" placeholder="Azerty123" name="password2" required>
      </div>
    <button type="submit" class="btn btn-primary">Créer mon compte</button>
  </form>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>
