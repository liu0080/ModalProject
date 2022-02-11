<?php require('classes\contact_form_info.php');
$ok = false;
if (array_key_exists('email', $_POST) && $_POST['email'] != "" && array_key_exists('section', $_POST) && array_key_exists('message', $_POST) && $_POST['message'] !='') {
    $ok = ContactInfo::insererMessage($dbh, $_POST['email'], $_POST['section'], $_POST['message'], date("Y/m/d"));
}
if ($ok) {
    echo "<h3> Succesfully sent! </h3>";
}
?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class=" col-md-6">
            <form autocomplete="off" method="POST" action="index.php?page=contacts">
                <fieldset>
                    <div class="row text-center text-white">
                        <div class="col-lg-8 mx-auto">
                            <h1 style="color:white;margin-top: 30px;">Contact Us!</h1>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style='color:aliceblue' class="form-label mt-4">Email address</label>
                        <input autocomplete="off" type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="sport_section" class="form-label mt-4" style='color:aliceblue'>Where do you come from?</label>
                        <select class="form-select" name='section' id="sport_section">
                            <option >Crossfit</option>
                            <option>Tennis</option>
                            <option>Football</option>
                            <option>Boxing</option>
                            <option>Volleyball</option>
                            <option>Rugby</option>
                            <option>Natation</option>
                            <option>Raid</option>
                            <option>Handball</option>
                            <option value="">Fencing</option>
                            <option value="">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea" style='color:aliceblue' class="form-label mt-4">Your message:</label>
                        <textarea class="form-control" name='message' id="exampleTextarea" rows="3" required></textarea>
                    </div>
                    <br>
                    <center style='color:aliceblue'><button type="submit" class="btn btn-primary">Submit</button> We will reply as soon as possible.</center>
                    </br>
                </fieldset>
            </form>
        </div>
    </div>

</div>