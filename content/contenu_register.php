<?php
require('classes/demande_registration.php');

if(array_key_exists('login', $_POST)&&array_key_exists('mdp', $_POST) && array_key_exists('mdp2', $_POST)&&!$_POST['login'] == "" ){
    if ($_POST['mdp'] == $_POST['mdp2'] && strlen($_POST['mdp'])>=8) {
        if (Utilisateur::getUtilisateur($dbh, $_POST['login']) || Demande::getUtilisateur($dbh, $_POST['login'])) {
            echo "<script>alert('Cet ID existe déjà !');</script>";
        } else {
            Demande::insererUtilisateur($dbh, $_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['promotion'], $_POST['email']);
            echo <<<END
        "<script>
                parent.location.href = 'index.php?page=succes';
            </script>";
END;
        }
    }else{
        echo "<script>alert('Inscription non valide !')</script>";
    }
}
?>
<section>
    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/POLYTECHNIQUE-IP_PARIS.png" alt="" width="300" class="mb-3" style="margin-left: 120px;
                     margin-top: 50px;">
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" method="POST" action='index.php?page=register'>
                    <h1 style="font-size: 3rem; color: aliceblue;"> S'inscrire </h1>
                    <div class="form-group">
                        <label class="form-label mt-4" style="color: aliceblue;"><b>ID &nbsp;&nbsp;&nbsp;</b><span id="validatorID"></span></label>
                        <input type="text" id="login" name='login' class='form-control' placeholder="Votre ID, prénom.nom recommendé" value="" required>
                        <div></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-4" style="color: aliceblue;"><b>Mot de passe &nbsp;&nbsp;&nbsp;</b><span id="validatorMDP"></span></label>
                        <input type="password" name='mdp' class='form-control' id="mdp" placeholder="Votre mot de passe" value="" required>
                        
                    </div>
                    <div class="form-group has-success">
                        <label class="form-label mt-4" style="color: aliceblue;"><b>Vérifier  votre mot de passe &nbsp;&nbsp;&nbsp;</b><span id="validatorConfirm"></span></label>
                        <input type="password" name='mdp2' class='form-control' id="confirm" placeholder="Vérifier votre mot de passe" value="" required>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label mt-4" style="color: aliceblue;"><b>Nom</b></label>
                                <input type="text" name='nom' class='form-control' id="input_nom" placeholder="Votre nom" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label mt-4" style="    color: aliceblue;"><b>Prénom</b></label>
                                <input type="text" name='prenom' class='form-control' id="input_prenom" placeholder="Votre prénom" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label class="form-label mt-4" style="    color: aliceblue;"><b>Promotion</b></label>
                                <select class="form-select" id="exampleSelect1" name='promotion' required>
                                    <option value="" disabled selected>Votre Promotion</option> 
                                    <option value="X2021">X2021</option>
                                    <option value="X2020">X2020</option>
                                    <option value="X2019">X2019</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <label class="form-label mt-4" style="  color: aliceblue;"><b>Address mail</b></label>
                                <input type="email" name='email' class='form-control' id="input_email" placeholder="Votre address mail" value="" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <br>
                        <button type="submit" class="btn btn-primary" style=" margin-left: 25%"> S'inscrire </button> <span style="color:black "> Vous avez déjà un compte? </span> <a style="color:#375a7f" href="index.php?page=signin">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    $('#login').blur(function(){        // to check if the id is authorised
        var idReg = /^[a-zA-Z0-9\.\-]{1,}$/;
        if ($(this).attr("value").search(idReg) == -1){
            $('#validatorID').html("L'ID ne doit contenir que des lettres, des chiffres et '.' '-'");
            $('#validatorID').attr("style", "color:red");
        }else{
            $('#validatorID').html("L'ID autorisé");
            $('#validatorID').attr("style", "color:green");
        }
    });
    
    $("#mdp").blur(function(){
       var mdp = $(this).attr("value");
       if (mdp.length < 8) {
           $("#validatorMDP").html("Le mot de passe ne doit contenir au moins 8 caractères");
           $('#validatorMDP').attr("style", "color:red");
       }else{
           $('#validatorMDP').html("Mot de passe autorisé");
           $('#validatorMDP').attr("style", "color:green");
       }
    });
    
    $("#confirm").blur(function(){
       var confirm = $(this).attr("value"); 
       var mdp = $("#mdp").attr("value");
       if (mdp != confirm){
           $("#validatorConfirm").html("Les deux mots de passe ne correspond pas");
           $('#validatorConfirm').attr("style", "color:red");
       }else{
           $('#validatorConfirm').html("Mot de passe valide");
           $('#validatorConfirm').attr("style", "color:green");
       }
    });
</script>
</section>

