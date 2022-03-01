<?php
$user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
if (isset($_POST['login'])) {
    Utilisateur::updateUtilisateur($dbh, $_POST['login'], $_POST['promotion'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tele'], $_POST['facebook']);
    echo "<script> alert('Profile Update Successful !');parent.location.href='index.php?page=compte'; </script>";
}
if (isset($_POST['mdp'])) {
    $user->updateMDP($dbh, $_POST['mdp']);
    echo "<script> alert('Password Update Successful !');parent.location.href='index.php?page=compte'; </script>";
}
if (isset($_POST['avatar'])) {
    Utilisateur::updatePhoto($dbh, $_SESSION['login'], $_POST['avatar']);
    echo "<script> alert('Photo Update Successful !');parent.location.href='index.php?page=compte'; </script>";
}
?>

<section>
    <div class="container emp-profile">
        <div class="d-grid gap-2">
            <a href="index.php?page=compte" role="button" class="btn btn-danger">Annuler</a>
        </div>
        <form class="form-horizontal" method="POST" action="#">
            <div class="mb-3">
                <label for="login" class="form-label" style="color:#375a7f">ID(non-éditable)</label>
                <?php
                echo '<input type="text" id="login" name="login" class="form-control profile-color" value="' . $user->login . '" readonly/>';
                ?>
            </div>
            <div class="mb-3">
                <label for="promotion" class="form-label" style="color:#375a7f">Promotion(non-éditable)</label>
                <?php
                echo '<input type="text" id="promotion" name="promotion" class="form-control profile-color" value="' . $user->promotion . '" readonly/>';
                ?>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label" style="color:#375a7f">Nom</label>
                <?php
                echo '<input type="text" class="form-control profile-color" name="nom" id="nom" value="' . $user->nom . '"/>';
                ?>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label" style="color:#375a7f">Prénom</label>
                <?php
                echo '<input type="text" class="form-control profile-color" name="prenom" id="prenom" value="' . $user->prenom . '"/>';
                ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="color:#375a7f">Email</label>
                <?php
                echo '<input type="email" class="form-control profile-color" name="email" id="email" value="' . $user->email . '"/>';
                ?>
            </div>
            <div class="mb-3">
                <label for="tele" class="form-label" style="color:#375a7f">Téléphone</label>
                <?php
                echo '<input type="tel" class="form-control profile-color" name="tele" id="tele" value="' . $user->tele . '"/>';
                ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" style="color:#375a7f">Lien de Facebook</label>
                <?php
                echo '<input type="text" class="form-control profile-color" name="facebook" id="facebook" value="' . $user->facebook . '"/>';
                ?>
            </div>
            <div class="col-md-2">
                <button type="submit" id="enoyer-photo" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
        <br />
        <form class="form-horizontal" method="POST" action="#">
            <fieldset>
                <legend style="color:#375a7f">Changer ta photo de profil</legend>
                <div class="col-md-6">
                    <div class="form-group">
                        <div id="queue"></div>
                        <input id="file_upload" name="file_upload" type="file">
                        
                        <div class="well well-sm well-img">
                            <span id="postThumbnail"></span>
                        </div>
                        <input id="postThumbnailName" style="display: none;" name="avatar" type="text" class="form-control">
                    </div>
                    <script>
                        <?php $timestamp = time(); ?>
                        $(function() {
                            $('#file_upload').uploadifive({
                                'auto': true,
                                'buttonText': 'Choisir Votre Photo',
                                'fileSizeLimit': 500,           // can't upload a photo more than 500KB
                                'queueSizeLimit': 1,
                                'width': 220,
                                'height': 50,
                                //'checkScript': 'plugin/uploadify/Sample/check-exists.php',
                                'fileType': '.jpg,.jpeg,.gif,.png',     // only image can be uploaded
                                'formData': {
                                    'timestamp': '<?php echo $timestamp; ?>',
                                    'token': '<?php echo md5('unique_salt' . $timestamp); ?>'
                                },
                                'queueID': 'queue',
                                'uploadScript': 'plugin/uploadify/Sample/uploadifive.php',
                                'onUploadComplete': function(file, data) {
                                    console.log(data);
                                    var img = "<img src='/Testing/uploads/" + data + "' height='100' style = 'margin-top:20px' alt='Uploaded Image' class='img-responsive' />";
                                    $('#postThumbnail').text('');
                                    $(img).prependTo('#postThumbnail');
                                    $('#postThumbnailName').val(data);
                                }
                            });
                            $('input:file').change(
                                function() {
                                    if ($(this).val()) {
                                        $('#envoyerPhoto').attr('disabled', false);
                                    }
                                }
                            );
                        });
                    </script>
                </div>
                <br>
                <div class="col-md-2">
                    <button type="submit" id="envoyerPhoto" class="btn btn-primary" disabled>Envoyer</button>
                </div>
            </fieldset>
        </form>
        <br />
        <form class="form-horizontal" method="POST" action="#">
            <fieldset>
                <legend style="color:#375a7f">Changer ton mot de passe</legend>
                <div class="mb-3">
                    <label for="mdp" class="form-label" style="color:#375a7f">Nouveau mot de passe</label>
                    <input type="password" class="form-control profile-color" name="mdp" id="mdp" onkeyup="check()" />
                </div>
                <div class="mb-3">
                    <label for="confirme" class="form-label" style="color:#375a7f">Confirmer le mot de passe</label>
                    <input type="password" class="form-control profile-color" name="confirme" id="confirme" onkeyup="check()" />
                    <span id='message'></span>
                </div>
                <div class="col-md-2">
                    <button type="submit" id="btnmdp" class="btn btn-primary" disabled>Envoyer</button>
                </div>
            </fieldset>
        </form>
    </div>

    <script>
        function check() { // to check if the password is not empty and confirm matches
            var mdp = document.getElementById('mdp').value;
            var remdp = document.getElementById('confirme').value;
            if (mdp == "") {
                document.getElementById('message').style.color = "#ff7851";
                document.getElementById('message').innerHTML = "Le mot de passe requis";
            } else if (mdp == remdp) {
                document.getElementById('message').style.color = "#56cc9d";
                document.getElementById('message').innerHTML = "Le mot de passe marche bien";
                $("#btnmdp").attr("disabled", false);
            } else {
                document.getElementById('message').style.color = "#ff7851";
                document.getElementById('message').innerHTML = 'Les deux mots de passe ne correspondent pas';
            }
        };
    </script>
</section>