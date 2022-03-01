<?php
function generateHTMLHeader($title)
{
    // on ecrit HTML
    echo <<<END
<!DOCTYPE html>
<html lang="en">
<head>
    <title>$title</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/5/darkly/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="plugin/tinymce/tinymce.min.js" ></script>
    <script  src="plugin/tinymce/init-tinymce.js" ></script>


    <script src="plugin/uploadify/Sample/jquery.min.js" ></script>
    <script src="plugin/uploadify/Sample/jquery.uploadifive.js" ></script>  
    <link rel="stylesheet" type="text/css" href="plugin/uploadify/Sample/uploadifive.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
      
</head>
<body>
<a id="totop"></a>

END;
}

function generateHTMLFooter() //footer
{
    echo <<<END
    <!-- Footer -->
    <footer class="bg-white container-fluid">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4"><img src="img/logo.jpeg" alt="" width="150" class="mb-3">
                </div>
                <div class="col-lg-4">
                    <h5 class="text-uppercase font-weight-bold mb-4" style="color:#375a7f">CrossFit</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2" ><a href="index.php?page=ourteam" style="text-decoration : none" class="text-muted">À propos de nous</a></li>
                            <li class="mb-2" ><a href="index.php?page=policy" style="text-decoration : none" class="text-muted">Our Policy</a></li>
                        </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-uppercase font-weight-bold mb-4" style="color:#375a7f" >Quick Contacts</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"  ><a href="#" style="text-decoration : none" class="text-muted">Téléphone :+33 669507899</a></li>
                            <li class="mb-2"  ><a href="#"  style="text-decoration : none" class="text-muted">E-mail: crossfitx2020@gmail.com</a></li>
                            <li ><a style="color:#375a7f" href="index.php?page=contacts" ><i aria-hidden="true"></i> Envoyez-nous un message!</a></li>
                        </ul>
                        <h5 style="
                        margin-bottom: 20px;
                        margin-top: 20px;
                        ">Social Links</h5>
                        <ul class="kilimanjaro_social_links">
                            <li><a href="https://www.facebook.com/laychiva.chhout.3/"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                            <li><a href="https://www.instagram.com/x20_crossfit/"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                        </ul>
                </div>
            </div>
        </div>
        <!-- Copyrights -->
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2" >©CrossFit X2020 All rights reserved.</p>
            </div>
        </div>
    </footer>
    </body>
    </html>
    END;
}

$pageList = array(  //pages list
    array(
        "name" => "homepage",
        "title" => "Accueil",
        "id" => "index.php?page=homepage",
    ),
    array(
        "name" => "register",
        "title" => "Inscription",
        "id" => "register",
    ),
    array(
        "name" => "compte",
        "title" => "Mon compte",
        "id" => "compte",
    ),
    array(
        "name" => "signin",
        "title" => "Se Connecter",
        "id" => "signin",
    ),
    array(
        "name" => "addevent",
        "title" => "Add Event",
        "id" => "addevent",
    ),
    array(
        "name" => "ourevent",
        "title" => "Notre Evénement",
        "id" => "#ourevent",
    ),
    array(
        "name" => "contacts",
        "title" => "Contact Us",
        "id" => "index.php?page=contacts",
    ),
    array(
        "name" => "inbox",
        "title" => "Inbox",
        "id" => "#inbox",
    ),
    array(
        "name" => "ourteam",
        "title" => "Notre Equipe",
        "id" => "ourteam",
    ),
    array(
        "name" => "pending",
        "title" => "Attente de Vérification",
        "id" => "pending"
    ),
    array(
        "name" => "succes",
        "title" => "Succès",
        "id" => "succes"
    ),
    array(
        "name" => "gererevent",
        "title" => "Gérer Evénement",
        "id" => "gererevent"
    ),
    array(
        "name" => "sent",
        "title" => "Envoie Réussit",
        "id" => "sent"
    ),
    array(
        "name" => "user",
        "title" => "Utilisateur",
        "id" => "#user"
    ),
    array(
        "name" => "pending_user",
        "title" => "Demande en Attente",
        "id" => "#pending_user"
    ),
    array(
        "name" => "policy",
        "title" => "Notre Politique",
        "id" => "policy"
    ),
    array(
        "name" => "edit",
        "title" => "Editer Mon Profil",
        "id" => "edit"
    ),
    array(
        "name" => "gereruser",
        "title" => "Gérer Utilisateurs",
        "id" => "gereruser"
    ),
);

function checkPage($askedPage)
{
    global $pageList;
    foreach ($pageList as $page) {
        if ($page['name'] == $askedPage) {
            return true;
        }
    }
    return false;
}

function getPageTitle($askedPage)
{
    global $pageList;
    foreach ($pageList as $page) {
        if ($page['name'] == $askedPage) {
            return $page['title'];
        }
    }
    return "erreur";
}

function logIn($dbh)
{
    if (array_key_exists('login', $_POST) && array_key_exists('mdp', $_POST)) {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $user = Utilisateur::getUtilisateur($dbh, $login);
        if ((!$user == null) && $user->testerMDP($dbh, $mdp)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['login'] = $login;
        echo "<script>
            parent.location.href = 'index.php?page=homepage';
        </script>
        ";    
        } else {
        echo "<script>
            alert('Le login ou le mot de passe est incorrect !');
        </script>
        ";
        }   
    }
    //getHomepage();
}

function printLoginForm($askedPage)
{
    echo <<<END
    <section>
    <form action ='index.php?page=$askedPage&todo=login' method='POST'>
    <div class="container" >
        <div class="row">
            <div class = "col-md-3">
            </div>
            <div class = "col-md-6">
                
                <input class='form-control me-sm-2' type = 'text' placeholder='Login' name='login'>
                <input class='form-control me-sm-2' type = "password" placeholder='Mot de passe' name='mdp' id="myInput">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onclick="myFunction()">     <!-- to make the password visible -->
                    <label style="color:#375a7f" class="form-check-label" for="flexSwitchCheckChecked">S'affichez le mot de passe</label>
                </div>
            </div>
            <div class = "col-md-3">
            </div>
        </div>
    </div>
    <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
            }
    </script>        
    <button style = "margin-left : 40%" class='btn btn-primary' type='submit'>Se connecter</button> <span style="color:black">Vous n'avez pas de compte?  </span><a style="color:#375a7f" href="index.php?page=register">S'inscrire</a>
    </form>
    </section>
    END;
}

function printLogoutForm()
{
    echo <<<END
    <div class="nav-item dropdown" style="margin-right : 35px">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: aliceblue">
            Profile <img src="img/png_profile.jpg" style="vertical-align: middle;
            width: 25px;
            height: 20px;
            border-radius: 50%;" ></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=compte">Votre profile</a>
            <div class="dropdown-divider"> 
            </div>
            <a class="dropdown-item" href="index.php?page=info&todo=logout"><input type ='submit' value='Se déconnecter' class ="btn btn-danger"></a>
            </div>
          </div>
        </div>
        </div>
    END;
}

function logOut()
{
    $_SESSION['loggedIn'] = false;
    unset($_SESSION['login']);
}

function getHomepage()
{
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        echo <<<END
                <div class="banner" style="width: 100%;
                height: 100vh;
                background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)),
                url(img/image1.jpg);
                background-size: cover;
                background-position: center;
                ">
                <div class="container-fluid">
                <!-- Text on image -->
                <div class="bg-text">
                    <h1 style="color:white;margin-bottom:50px">Pour la partrie, les sciences et la muscule</h1>
                    <a href="index.php?page=register" role="button" class="btn btn-primary">Rejoindre-nous</a>
                    <a href="index.php?page=signin" role="button" class="btn btn-primary">Éspace crossfit-er</a>
                    <a href="index.php?page=ourteam" role="button" class="btn btn-primary">À propos de nous</a>
                </div>
            </div>
                </div>
                
        END;
        global $dbh;
        $sql = "SELECT * FROM event ORDER BY date DESC LIMIT 4";
        $result = $dbh->query($sql);
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
            // Output the events in the table 'event'
            while ($row = $result->fetch()) {
                if ($row['status'] == "Published") {
                    echo <<<END
                    <div class="col-md-3" >
                    <div class="card mb-3" style="background-color: white" >
                        <h4 style="background-color: #375a7f" class="card-header">{$row["title"]}</h4>
                        <img src="uploads/{$row["photo"]}" alt="" height="200"> 
                        <div class="card-body">
                        <a class="btn btn-primary" style='margin-left :70%' data-bs-toggle="collapse" href="#name{$row['id']}" role="button" aria-expanded="false">
                                Détail
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
                            La date d'événement: {$row['date']}
                        </div>
                    </div>
                    </div>
                END;
                }
                // echo "title: " . $row["title"] . " - Content: " . $row["content"] . " authur " . $row["authur"] . " date " . $row["date"] . " status " . $row["status"] . " photo " . $row["photo"] . "<br>";
            }
        } else {
            echo "";
        }
        echo <<<END
                    </div>
                    <div class="container" style="margin-top:20px">
                            
                        <a class="btn btn-primary" href="index.php?page=ourevent" style="float:right">Plus d'info</a>
                          
                    </div>
                    </div>
    </section>
    
    END;
    } else {
        global $dbh;
        $sql = "SELECT * FROM event LIMIT 4";
        $result = $dbh->query($sql);
        echo <<<END
                <section id="ourevent">
                        <div class="container py-3">
                            <div class="row text-center text-white">
                                <div class="col-lg-8 mx-auto">
                                    <h1 style='color:white'>Notre événement</h1>
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
                <div class="col-md-3" >
                <div class="card mb-3" style="background-color: white" >
                    <h4 style="background-color: #375a7f" class="card-header">{$row["title"]}</h4>
                    <img src="uploads/{$row["photo"]}" alt="" height="200"> 
                    <div class="card-body">
                    <a class="btn btn-primary" style='margin-left :70%' data-bs-toggle="collapse" href="#name{$row['id']}" role="button" aria-expanded="false">
                            Détail
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
                        La date d'événement: {$row['date']}
                    </div>
                </div>
                </div>   
                END;
                // echo "title: " . $row["title"] . " - Content: " . $row["content"] . " authur " . $row["authur"] . " date " . $row["date"] . " status " . $row["status"] . " photo " . $row["photo"] . "<br>";
            }
        } else {
            echo "";
        }
        echo <<<END
                </div>
                    <div class="container" style="margin-top:20px">
                    <a class="btn btn-outline-primary" href="index.php?page=addevent" style="float:right"> Ajoute </a>
                    <a class="btn btn-primary" href="index.php?page=ourevent" style="float:right">Plus d'info</a>
                    </div>
                </div>
            </section>
END;
    }
}

function generateMenu($askedPage)
{
    global $dbh;
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        global $pageList;
        echo <<<END
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=homepage">CrossFit</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                    
        END;
        foreach ($pageList as $page) {
            if (array_key_exists('menutitle', $page)) {
                $active = "";
                if ($page['name'] == $askedPage) {
                    $active = "active";
                }
                echo <<<END
                    <li class='nav-item $active'>
                END;

                if ($_SERVER['REQUEST_URI'] == "/Testing/index.php?page=homepage") {
                    echo "   <a class='nav-link' href='{$page['id']}'>{$page["menutitle"]}
                                 <span class='sr-only'></span></a>
                            </li>";
                } else {
                    echo "   <a class='nav-link' href='index.php?page=homepage{$page['id']}'>{$page["menutitle"]}
                <span class='sr-only'></span></a>
                </li>";
                }
            }
        }
        echo <<<END
                </ul>
                <form class = "d-flex">
                <a href="index.php?page=signin" role="button" class="btn btn-outline-light">Se connecter</a>
                </form>
                END;
        echo <<<END
                </div>
                </div>
            </nav>
        END;
    } else {
        $user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
        if ($user->Admin == 1) {
            global $pageList;
            echo <<<END
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php?page=homepage">CrossFit</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item active">
                        <a class="btn btn" href="index.php?page=compte&user={$_SESSION['login']}">{$user->login}</a>
                        </li>
                            <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear" style="font-size:20px;"></i></a>
                            <div class="dropdown-menu dropdown-menu-lg-end">
                            <a class="btn btn" href="index.php?page=inbox" style="font-size:0.80rem">Inbox</a>
                            <a class="btn btn" href="index.php?page=gereruser" style="font-size:0.80rem">Gérer utilisateur</a>
                            <a class="btn btn" href="index.php?page=pending_user" style="font-size:0.80rem">Utilisateurs en attente</a>
                              <div class="dropdown-divider"></div>
                              <a class ="btn btn" href="index.php?page=info&todo=logout" style="color:red">
                                 Se déconnecter
                              </a>
                            </div>
                          </li> 
                          
                        </ul>
                        
        END;
        } else {
            global $pageList;
            echo <<<END
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php?page=homepage">CrossFit</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                    
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0>

                        <li class="nav-item active">
                        <a class="btn btn" href="index.php?page=compte&user={$_SESSION['login']}">{$user->login}</a>
                        </li>

                            <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear" style="font-size:20px;"></i></a>
                            <div class="dropdown-menu dropdown-menu-lg-end">
                            <a class="btn btn" href="index.php?page=user" style="font-size:0.80rem">Tous les utilisateurs</a>
                              <div class="dropdown-divider"></div>
                              <a class ="btn btn" href="index.php?page=info&todo=logout" style="color:red">
                                 Se déconnecter
                              </a>
                            </div>
                          </li> 
                          
                        </ul>
        END;
        }

        echo <<<END
        </div>
    </div>
    </nav>
    END;
    }
}
