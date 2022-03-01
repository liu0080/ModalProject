<?php
$sql = "SELECT * FROM utilisateurs";

$sql = $result = $dbh->query($sql);

echo <<<END

<section>
<div style = "text-align: center">
    <h2 style="color:#375a7f"> 
        CrossFit
    </h2>
    <p style="color:#375a7f">
        Cette section sportive a été créée en 2020 à l'École Polytechnique. 
    </p>
</div>
<br><br>
<div class="container">
<h4 style="color:#375a7f">Nos membres:</h4>
<br><br>
<div class="row">
END;
if ($result->rowCount() > 0) {
  // Output the users in the table 'utilisateur'
  while ($row = $result->fetch()) {
    echo <<<END
            <div class='col-md-3'>
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 100%;
                border-radius: 5px;">
                    <img src="uploads/{$row['avatar']}" alt="Avatar" style="width:100%;height:180px">
                    <div class="container" style="padding: 2px 16px;">
                        <h6><b>Name: {$row['nom']} {$row['prenom']}</b></h6> 
                        <p>Email: {$row['email']}</p> 
                        <p>Promotion: {$row['promotion']}</p> 
        END;
    // if ($row['Admin'] == 0) {
    //     echo "<p> Student </p>";
    // } else {
    //     echo "<p> Chef de la section </p>";
    // }
    echo <<<END
        </div>
        </div>
        </div>
        END;
  }
} else {
  echo "";
}
echo <<<END
</div>
<br><br>
<a href="https://www.polytechnique.edu/fr/sports" style="color:#375a7f"><h4 style="color:#375a7f">Les infrastructures sportives de qualité</h4></a>

</div>
</section>


END;
