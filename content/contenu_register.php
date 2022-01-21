
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
if ($ok) {
    echo "<h3> Succesfully registered! </h3>";
} else {
    echo <<<END
    <style>
    .container
    {
    width: 500px;
    margin-left: auto;
    margin-right: auto;
    }
    </style>
    <div class="container">
    <form class = "form-horizontal" role="form" method = "POST" action='index.php?page=register'>
        <Legend> Register </Legend>
        <div class = "form-group">
            <label for="input login"class="form-label mt-4"><b>Email address</b></label>
            <input type="text" name='login' class='form-control' aria-describedby="emailHelp" placeholder="Enter email"  value=""  required>
        </div>
        <div class ="form-group">
            <label for="password" class="form-label mt-4"><b>Password</b></label>
            <input type="password" name='mdp' class='form-control' id= "input_mdp" placeholder="Enter your password" value="" required>
        </div>
        <div class ="form-group">
            <label for="psw-repeat" class="form-label mt-4"><b>Verify your password</b></label>
            <input type="password" name='mdp2' class='form-control' id= "input_mdp2" placeholder="Verify your password" value="" required>
        </div> 
            <label for="nom" class="form-label mt-4"><b>First Name</b></label>
            <input type="text" name='nom' class='form-control' id= "input_nom" placeholder="Enter your first name" value="" required>
        <div class ="form-group">
            <label for="psw-repeat" class="form-label mt-4"><b>Last Name</b></label>
            <input type="text" name='prenom' class='form-control' id= "input_prenom" placeholder="Enter your last name" value="" required>
        </div>
            <br><center><button type="submit" class="btn btn-primary"> Register</button> Already have an account? <a href="index.php?page=signin">Sign in</a>.</center></br>
    </form>
    </div>
END;
}
?>