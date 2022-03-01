<?php

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    $sql = "SELECT * FROM event ORDER BY date DESC";
    $sql = $result = $dbh->query($sql);
    echo <<<END
        <section id="ourevent"> 
                <div class="container py-5">
                    <div class="row text-center text-white">
                        <div class="col-lg-8 mx-auto">
                            <h2 style='color:white'>Notre événement</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
END;
    if ($result->rowCount() > 0) {
        // output data of each row
        while ($row = $result->fetch()) {
            if ($row['status'] == "Published") {
                echo <<<END
                <div class="col-md-3">
                <div class="card mb-3" style="background-color: white" >
                    <h4 style="background-color: #375a7f" class="card-header">{$row["title"]}</h4>
                    
                    <img src="uploads/{$row["photo"]}" alt="" height="200"> 
                    <div class="card-body">
                    <a class="btn btn-primary" style='margin-left :70%' data-bs-toggle="collapse" href="#name{$row['id']}" role="button" aria-expanded="false">
                            détail
                            </a>
                            <div style="background-color: #375a7f" class="collapse" id="name{$row['id']}">
                            <div style="background-color: #375a7f" class="card card-body">
                            {$row["content"]}
                            </div>
                            </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #375a7f">Auteur: {$row["authur"]}</li>
                    </ul>
                    <div class="card-footer text-muted">
                        La date : {$row['date']}
                    </div>
                </div>
                </div>      
        END;
            }
        }
    } else {
        echo "";
    }
    echo <<<END
        </div>
        </div>

    </section>
    END;
} else {
    $user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
    $sql = "SELECT * FROM event ORDER BY date DESC";
    $sql = $result = $dbh->query($sql);
    echo <<<END
        <section id="ourevent"> 
                <div class="container py-5">
                    <div class="row text-center text-white">
                        <div class="col-lg-8 mx-auto">
                            <h2 style='color:white'>Notre événement</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
END;
    if ($result->rowCount() > 0) {
        // output data of each row
        while ($row = $result->fetch()) {
            echo <<<END
        <div class="col-md-3" id ="{$row["id"]}" >
        END;
            if ($user->Admin == 1) {
                echo <<<END
            <a class="supprimer bg" style="float: right; color: red " role="button" aria-expanded="false">
            <i class="fa fa-trash" style="font-size:larger"></i>
            </a>
            END;
            }
            echo <<<END
        <div class="card mb-3" style="background-color: white"  >
            <h4 style="background-color: #375a7f" class="card-header">{$row["title"]}</h4>
            
            <img src="uploads/{$row["photo"]}" alt="" height="200"> 
            <div class="card-body">
            <a class="btn btn-primary" style='margin-left :70%' data-bs-toggle="collapse" href="#name{$row['id']}" role="button" aria-expanded="false">
                    détail
                    </a>
                    <div style="background-color: #375a7f" class="collapse" id="name{$row['id']}">
                    <div style="background-color: #375a7f" class="card card-body">
                    {$row["content"]}
                    </div>
                    </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" style="background-color: #375a7f">Authur: {$row["authur"]}</li>
            </ul>
            <div class="card-footer text-muted">
                La date : {$row['date']}
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
        <div class="container" style="margin-top:20px">
                            
            <a class="btn btn-primary" href="index.php?page=addevent" style="float:right">Ajouter un événement</a>
                
                                
        </div>
    </div>
    </section>
    END;
}
?>
<script>
    $('a.supprimer').click(function() // to reject the registration
        {
            if (confirm("Êtes-vous sûr de supprimer cette utilisateur ?")) {
                var id = $(this).parent().attr('id');
                var parentTR = $(this).parent();
                $.ajax({
                    type: "POST",
                    url: "scripts/postAjax.php",
                    data: {
                        eventID: id
                    },
                    cache: false,

                    success: function(data) {
                        parentTR.fadeOut('fast', function() {
                            $(this).remove();
                        });
                    }
                });
            }
        });
</script>
