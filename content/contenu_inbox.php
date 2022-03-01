<?php
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
    echo "<script> alert('Vous devez vous connecter !');parent.location.href='index.php?page=signin'; </script>";
}
$user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
if ($user->Admin == 0) {
    echo "<script> alert('Vous ne pouvez pas accéder à cette page');parent.location.href='index.php?page=homepage'; </script>";
}
$sql = "SELECT * FROM contact_form_info ORDER BY date DESC";

$sql = $result = $dbh->query($sql);
echo <<<END
<section>
<div class="container">
    <table class="table table-info" style="background-color:#375a7f">
    <thead style="background-color:#375a7f">
    <tr>
        <th style="background-color:#375a7f" scope="col">E-mail</th>
        <th style="background-color:#375a7f" scope="col">Section</th>
        <th style="background-color:#375a7f" scope="col">Message</th>
        <th style="background-color:#375a7f" scope="col">Date</th>
    </tr>
</thead>
END;
if ($result->rowCount() > 0) {
    // output data of each row
    while ($row = $result->fetch()) {
        echo <<<END
            <tbody>
                <tr class="table-light">
                    <td>{$row["email"]}</td>
                    <td>{$row["section"]}</td>
                    <td>{$row["message"]}</td>
                    <td>{$row["date"]}</td>
                </tr>
            </tbody>
        END;
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
