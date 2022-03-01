<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
$user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
if ($user->Admin == 0) {
    echo "<script> alert('Vous ne pouvez pas accéder à cette page');parent.location.href='index.php?page=homepage'; </script>";
}
$sql = "SELECT * FROM utilisateurs";

$sql = $result = $dbh->query($sql);
echo <<<END
<section>
<div class="container">
    <table class="table table-info">
    <thead>
    <tr>
        <th style="background-color:#375a7f" scope="col">Rang</th>
        <th style="background-color:#375a7f" scope="col">Nom</th>
        <th style="background-color:#375a7f" scope="col">Prenom</th>
        <th style="background-color:#375a7f" scope="col">Promotion</th>
        <th style="background-color:#375a7f" scope="col">E-mail</th>
        <th style="background-color:#375a7f" scope="col">Téléphone</th>
        <th style="background-color:#375a7f" scope="col">Titre</th>
        <th style="background-color:#375a7f" scope="col">Autres</th>
    </tr>
</thead>
END;
if ($result->rowCount() > 0) {
    // output data of each row
    $count = 1;
    while ($row = $result->fetch()) {
        if ($row['login'] != $_SESSION['login']) {
            echo <<<END
                <tbody>
                    <tr id ="{$row["login"]}" class="table-light">
                        <td><a style="color:white" href="index.php?page=compte&user={$row['login']}">$count</a> </td>
                        <td>{$row["nom"]}</td>
                        <td>{$row["prenom"]}</td>
                        <td>{$row["promotion"]}</td>
                        <td>{$row["email"]}</td>
                        <td>{$row["tele"]}</td>       
            END;
            if ($row['Admin'] == 1) {
                echo "<td class='titre'> Admin </td>";
            } else {
                echo "<td class='titre'> Élève </td>";
            }
            if ($row['Admin'] == 0) {
                echo <<<END
                <td>
                <button class="promot btn btn-danger">Promouvoir</button>
                <button class="delete btn btn-danger"><i class="fa fa-trash" style="font-size:larger"></i></button>
                </td>
                </tr>
                </tbody>
            END;
            } else {
                echo <<<END
                    <td></td>
                    </tr>
                    </tbody>
                END;
            }
            $count = $count + 1;
        }
        //echo "Email: " . $row["email"] . " - Section: " . $row["section"] . " message " . $row["message"] . " date " . $row["date"] . "<br>";
    }
} else {
    echo "";
}
echo <<<END
</table>
</div>
</section>
END;
?>
<script>
    $('button.delete').click(function() // to delete the user
        {
            if (confirm("Êtes-vous sûr de supprimer cette utilisateur ?")) {
                var id = $(this).parent().parent().attr('id');
                var parentTR = $(this).parent().parent();

                $.ajax({
                    type: "POST",
                    url: "scripts/postAjax.php",
                    data: {
                        deleteID: id
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
    $('button.promot').click(function() // to promote the user to admin
        {
            if (confirm("Êtes-vous sûr de promouvoir cette utilisateur ?")) {
                var id = $(this).parent().parent().attr('id');
                var titre = $(this).closest('td').prev(".titre");

                $.ajax({
                    type: "POST",
                    url: "scripts/postAjax.php",
                    data: {
                        promotID: id
                    },
                    cache: false,

                    success: function() {
                        titre.html("Admin");
                    }
                });
            }
        });
</script>