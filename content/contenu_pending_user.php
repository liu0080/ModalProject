<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
$user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
if ($user->Admin == 0) {
    echo "<script> alert('Vous ne pouvez pas accéder à cette page');parent.location.href='index.php?page=homepage'; </script>";
}

$sql = "SELECT * FROM demande_registration";

$sql = $result = $dbh->query($sql);
?>
<section>
    <div class="container">
        <table class="table table-info">
            <thead>
                <tr>
                    <th style="background-color:#375a7f" scope="col">Login</th>
                    <th style="background-color:#375a7f" scope="col">Nom</th>
                    <th style="background-color:#375a7f" scope="col">Prénom</th>
                    <th style="background-color:#375a7f" scope="col">Promotion</th>
                    <th style="background-color:#375a7f" scope="col">E-mail</th>
                    <th style="background-color:#375a7f" scope="col">Accepter or Refuser</th>
                </tr>
            </thead>
            <?php
            if ($result->rowCount() > 0) {
                // output data of each row
                while ($row = $result->fetch()) {
                    echo <<<END
            <tbody>
                <tr id ="{$row["login"]}" class="table-light"> 
                    <td>{$row["login"]}</td>
                    <td>{$row["nom"]}</td>
                    <td>{$row["prenom"]}</td>
                    <td>{$row["promotion"]}</td>
                    <td>{$row["email"]}</td>
                    <td> <button class = "accept btn btn-success">Accept</button> <button class="reject btn btn-danger"><i class="fa fa-trash" style="font-size:larger"></i></button>
                    </td>
                </tr>
            </tbody>
        END;
                    //echo "Email: " . $row["email"] . " - Section: " . $row["section"] . " message " . $row["message"] . " date " . $row["date"] . "<br>";
                }
            }
            echo <<<END
        </table>
    </div>
</section>
END;
            ?>
            <script>
                $(document).ready(function() {
                    $('button.accept').click(function() // to accept the registration
                        {
                            if (confirm("Êtes-vous sûr de confirmer cette demande ?")) {
                                var parentTR = $(this).parent().parent();
                                var id = parentTR.attr('id');

                                $.ajax({
                                    type: "POST",
                                    url: "scripts/postAjax.php",
                                    data: {
                                        acceptID: id
                                    },
                                    cache: false,

                                    success: function() {

                                        parentTR.fadeOut('fast', function() {
                                            $(this).remove();
                                        });
                                    }
                                });
                            }
                        });

                    $('button.reject').click(function() // to reject the registration
                        {
                            if (confirm("Êtes-vous sûr de refuser cette demande ?")) {
                                var id = $(this).parent().parent().attr('id');
                                var parentTR = $(this).parent().parent();

                                $.ajax({
                                    type: "POST",
                                    url: "scripts/postAjax.php",
                                    data: {
                                        rejectID: id
                                    },
                                    cache: false,

                                    success: function() {
                                        parentTR.fadeOut('fast', function() {
                                            $(this).remove();
                                        });
                                    }
                                });
                            }
                        });
                });
            </script>