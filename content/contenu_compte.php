<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
if (!isset($_GET['user'])) {     // owner of the profile. Default value is `$_SESSION['login']` 
    $_GET['user'] = $_SESSION['login'];
}
$user = Utilisateur::getUtilisateur($dbh, $_GET['user']);
if (is_null($user)) {        // in the table, we can't find the corresponding user
    echo "<script> alert('Ce compte n'existe pas !');parent.location.href='index.php?page=homepage'; </script>";
}
?>
<section>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <?php
                        $user = Utilisateur::getUtilisateur($dbh, $_GET['user']);
                        $avatar = $user->avatar;
                        echo '<img src="uploads/' . $avatar . '" alt="avatar" style="border-radius: 50%;width:200px; height:200px;">';

                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php
                            echo $user->prenom . ' ' . $user->nom;
                            ?>
                        </h5>
                        <h6>
                            <?php
                            echo 'CrossFit ' . $user->promotion;
                            ?>
                        </h6>
                        <ul class="nav nav-tabs" role="tablist" style="color:#375a7f">
                            <li class="nav-item">
                                <a style="color:#0062cc" class="nav-link active" data-bs-toggle="tab" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:#0062cc" class="nav-link" data-bs-toggle="tab" href="#timeline">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                if ($user->login == $_SESSION['login']) {
                    echo <<<END
                <div class="col-md-2">
                    <a href="index.php?page=edit" role="button" class="btn btn-primary">Edit Profile</a>
                </div>
                END;
                }
                ?>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div class="tab-content profile-tab" style="text-align:center">
                        <label style="color:#375a7f">Lien de Facebook</label>
                        <br>
                        <a style="color:#0062cc" href="<?php echo $user->facebook; ?>"><?php echo $user->facebook; ?></a><br />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab">
                        <div class="tab-pane active" id="about" style="color:#375a7f">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo '<p>' . $user->login . '</p>';
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo '<p>' . $user->nom . '</p>';
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prénom:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo '<p>' . $user->prenom . '</p>';
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo '<p>' . $user->email . '</p>';
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Téléhone:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo '<p>' . $user->tele . '</p>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="timeline" style="color:#375a7f">
                            
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

</section>