
function formControl(){

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


}

