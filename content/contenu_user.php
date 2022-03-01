<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
$user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
if ($user->Admin == 1) {
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
                <tr class="table-light">
                    <td><a style="color:white" href="index.php?page=compte&user={$row['login']}">$count</a> </td>
                    <td>{$row["nom"]}</td>
                    <td>{$row["prenom"]}</td>
                    <td>{$row["promotion"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["tele"]}</td>       
        END;
            if ($row['Admin'] == 1) {
                echo "<td> Admin </td>";
            } else {
                echo "<td> Élève </td>";
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
