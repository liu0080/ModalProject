
<?php
$nom = "";
if (array_key_exists('nom', $_POST)) {
    $nom = $_POST['nom'];
}

$prenom = "";
if (array_key_exists('prenom', $_POST)) {
    $prenom = $_POST['prenom'];
}
$ok = false;
$tried = false;
if (array_key_exists('login', $_POST) && !$_POST['login'] == "" && array_key_exists('mdp', $_POST) && array_key_exists('mdp2', $_POST) && $_POST['mdp'] == $_POST['mdp2']) {
    $tried = true;
    $ok = Utilisateur::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom']);
}
//TODO Existed login
if ($ok) {
    echo <<<END
    <section>
    <div class="alert alert-dismissible alert-primary' style='margin-top : 10px'>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Welcome!</strong> You are become a CrossFit-Er Now!
    </div>
    </section>
    END;
} else {
    echo <<<END
    <section>
    <div class="container ">
    <div class="row">
    <div class ="col-md-6">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/POLYTECHNIQUE-IP_PARIS.png" alt="" width="300" class="mb-3" style="margin-left: 120px;
    margin-top: 50px;">
    </div> 
    <div class ="col-md-6">
    <form class = "form-horizontal" role="form" method = "POST" action='index.php?page=register'>
    <legend style="font-size: 3rem; color: aliceblue;"> Register </legend>
        <div class = "form-group">
            <label for="input login" class="form-label mt-4" style="    color: aliceblue;"><b>Email address</b></label>
            <input type="text" name='login' class='form-control' aria-describedby="emailHelp" placeholder="Enter email"  value=""  required>
        </div>
        <div class ="form-group">
            <label for="password" class="form-label mt-4" style="    color: aliceblue;"><b>Password</b></label>
            <input type="password" name='mdp' class='form-control' id= "password" placeholder="Enter your password" value="" onkeyup='check();' >
        </div>
        <div class ="form-group has-success">
            <label for="psw-repeat" class="form-label mt-4" style="    color: aliceblue;"><b>Verify your password</b></label>
            <input type="password" name='mdp2' class='form-control' id= "confirm_password" placeholder="Verify your password" value="" onkeyup='check();' >
            <span id='message'></span>
        </div> 

        <div class ="form-group">
            <label for="nom" class="form-label mt-4" style="    color: aliceblue;"><b>First Name</b></label>
            <input type="text" name='nom' class='form-control' id= "input_nom" placeholder="Enter your first name" value="" required>
        </div>
        <div class ="form-group">
            <label for="psw-repeat" class="form-label mt-4" style="    color: aliceblue;"><b>Last Name</b></label>
            <input type="text" name='prenom' class='form-control' id= "input_prenom" placeholder="Enter your last name" value="" required>
        </div>
            <br><center><button type="submit" class="btn btn-primary"> Register</button> Already have an account? <a href="index.php?page=signin">Sign in</a>.</center></br>
    </form>
    </div>

    <script>
    var check = function() {
        if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
          document.getElementById('message').style.color = "#56cc9d";
          document.getElementById('message').innerHTML = "Your password are matching";
        } else {
          document.getElementById('message').style.color = "#ff7851";
          document.getElementById('message').innerHTML = 'Your passwords are not matching';
        }
      }
    </script>
    </section>
END;
}
?>