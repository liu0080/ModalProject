<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <h4 class="alert-heading">Merci pour votre message !</h4>
                    <p class="mb-0">Nous vous répondrons dans les plus brefs délais ! Retour au <a href="index.php?page=homepage" class="alert-link"> page d'accueil</a>.</p>
                </div>
            </div>

            <div class="col-md-3">

            </div>
        </div>
    </div>
</section>