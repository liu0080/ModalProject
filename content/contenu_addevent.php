<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
require("classes/event.php");


$title = "";
if (array_key_exists('title', $_POST)) {
    $title = $_POST['title'];
}
$content = "";
if (array_key_exists('content', $_POST)) {
    $content = $_POST['content'];
}
$date = date("Y/m/d");
if (array_key_exists('date', $_POST)) {
    $date = $_POST['date'];
}
$authur = "";
if (array_key_exists('authur', $_POST)) {
    $authur = $_POST['authur'];
}
$status = "";
if (array_key_exists('status', $_POST)) {
    $status = $_POST['status'];
}
$photo = "";
if (array_key_exists('thumbnail', $_POST)) {
    $photo = $_POST['thumbnail'];
}

$ok = false;
if (array_key_exists('title', $_POST) && $_POST['title'] != "" && array_key_exists('content', $_POST) && $_POST['content'] != '' && array_key_exists('authur', $_POST) && $_POST['authur'] != '') {
    $ok = Event::insererEvent($dbh, $title, $content, $authur, $date, $status, $photo);
}
if ($ok) {
    echo "<script>
            parent.location.href = 'index.php?page=succes';
        </script>
        ";
}
?>


<div class="container">
    <div class="row justify-content-center">
            <div class=" col-md-8">
                <form autocomplete="off" method="POST" action="index.php?page=addevent">
                    <fieldset>
                        <div class="row text-center text-white">
                            <div class="col-lg-8 mx-auto">
                                <h1 style="color:white;margin-top: 30px;">Ajoutez</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style='color:aliceblue' class="form-label mt-4">Titre</label>
                                    <input autocomplete="off" type="text" class="form-control" name='title' placeholder="Le titre de l'événement" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label mt-4" style='color:aliceblue'>Status</label>
                                            <select class="form-select" name="status">
                                                <option selected>Published</option>
                                                <option>Unpublished</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label mt-4" style='color:aliceblue'>Date de cet événement</label>
                                            <input autocomplete="off" type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label mt-4" style='color:aliceblue'>Auteur</label>
                                        <input autocomplete="off" name="authur" class="form-control" placeholder="Le nom d'auteur" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-4" style='color:aliceblue'>Télécharger une vignette</label>
                                    <div id="queue"></div>
                                    <input id="file_upload" name="file_upload" type="file" >
                                    <a style="position: relative; top: 8px; color:#375a7f" href="javascript:$('#file_upload').uploadifive('upload')">Upload Files</a>
                                    <div class="well well-sm well-img">
                                        <span id="postThumbnail"></span>
                                    </div>
                                    <input id="postThumbnailName" style="display: none;" name="thumbnail" type="text" class="form-control">
                                </div>
                                <script>
                                    <?php $timestamp = time(); ?>
                                    $(function() {
                                        $('#file_upload').uploadifive({
                                            'auto': false,
                                            'queueSizeLimit': 1,    // we can only upload 1 image evvery time
                                            'fileSizeLimit': 5000,   // the image can't be larger than 3MB
                                            //'checkScript': 'plugin/uploadify/Sample/check-exists.php',
                                            'fileType': '.jpg,.jpeg,.gif,.png',     // only images can be uploaded
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
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label style='color:aliceblue' class="form-label mt-4">Contenu</label>
                                <textarea class="tinymce" name='content' required></textarea>
                            </div>
                            <div><br/>
                                <button type="submit" class="btn btn-primary" style='color:aliceblue'>Envoyer</button><br/>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
    </div>
</div>