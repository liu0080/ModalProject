<?php

require("classes/contact_form_info.php");

$ok = false;

if (array_key_exists('email', $_POST) && $_POST['email'] != "" && array_key_exists('section', $_POST) && array_key_exists('message', $_POST) && $_POST['message'] != '') {
    $ok = ContactInfo::insererMessage($dbh, $_POST['email'], $_POST['section'], $_POST['message'], date("Y/m/d"));
}
if ($ok) {
    echo "<script>
            parent.location.href = 'index.php?page=sent';
        </script>
        ";
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/POLYTECHNIQUE-IP_PARIS.png" alt="" width="300" class="mb-3" style="margin-left: 120px;
    margin-top: 50px;">
        </div>
        <div class=" col-md-6">
            <form autocomplete="off" method="POST" action="index.php?page=contacts">
                <fieldset>
                    <div class="row text-center text-white">
                        <div class="col-lg-8 mx-auto">
                            <h1 style="color:white;margin-top: 30px;">Contactez-Nous!</h1>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style='color:aliceblue' class="form-label mt-4">Address mail</label>
                        <input autocomplete="off" type="email" class="form-control" name='email' id="exampleInputEmail1" placeholder="e-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="sport_section" class="form-label mt-4" style='color:aliceblue'>Vous êtes?</label>
                        <select class="form-select" name='section' id="sport_section">
                            <option value="Crossfit" selected>Crossfit</option>
                            <option value="Tennis">Tennis</option>
                            <option value="Football">Football</option>
                            <option value="Boxe">Boxe</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Rugby">Rugby</option>
                            <option value="Natation">Natation</option>
                            <option value="Raid">Raid</option>
                            <option value="Handball">Handball</option>
                            <option value="Escrime">Escrime</option>
                            <option value="Autres">Autres</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style='color:aliceblue' class="form-label mt-4">Votre message:</label>
                        <textarea class="form-control" name='message' id="exampleTextarea" rows="3" required></textarea>
                    </div>
                    <br>
                    <button style="margin-left : 40%" type="submit" class="btn btn-primary">Envoyer</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>