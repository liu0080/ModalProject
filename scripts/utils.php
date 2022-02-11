<?php

function generateHTMLHeader($title)
{
    // on ecrit HTML
    echo <<<END
<!DOCTYPE html>
<html>
<head>
    <title>$title</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/5/minty/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="js/code.js" rel="script">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" 
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" 
        crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>                 //leaflet for map
            
</head>
<a name="totop"></a>
<body>
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
                    <p class="font-italic text-muted"><b>CrossFit BlaBlaBla</b></p>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-uppercase font-weight-bold mb-4">CrossFit</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2" ><a href="index.php?page=ourteam" style="text-decoration : none" class="text-muted">Our Team</a></li>

                            <li class="mb-2" ><a href="#"style="text-decoration : none" class="text-muted">Our Policy</a></li>
                        </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-uppercase font-weight-bold mb-4">Quick Contacts</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"  ><a href="#"style="text-decoration : none" class="text-muted">Phone Number :+33 669507899</a></li>
                            <li class="mb-2"  ><a href="#"  style="text-decoration : none"class="text-muted">Email: crossfitx2020@gmail.com</a></li>
                            <li><a href="index.php?page=contacts"><i  aria-hidden="true"></i> Send us message!</a></li>
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
        </div>
        <!-- Copyrights -->
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">©CrossFit X2020 All rights reserved.</p>
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
        "title" => "Accueil de notre site",
        "menutitle" => "Homepage",
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
        "title" => "Signin",
        "id" => "signin",
    ),
    array(
        "name" => "ourteam",
        "title" => "Our Team",
        "menutitle" => "Our Team",
        "id" => "#ourteam",
    ),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Contact us",
        "id" => "index.php?page=contacts",
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
function generateMenu($askedPage)
{
    global $pageList;
    echo <<<END
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#totop">CrossFit</a>
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
                echo "   <a class='nav-link active' href='{$page['id']}'>{$page["menutitle"]}
                                 <span class='sr-only'></span></a>
                            </li>";
            } else {
                echo "   <a class='nav-link active' href='index.php?page={$page['name']}'>{$page["menutitle"]}
                <span class='sr-only'></span></a>
                </li>";
            }
            //index.php?page={$page['name']}

        }
    }
    echo <<<END
                </ul>
                END;
    if ($_SESSION['loggedIn'] == false) {
        echo <<<END
            <form class = "d-flex">
                <a href='index.php?page=signin'><input type='button' value = 'Sign in' class='btn btn-outline-light my-2 my-sm-0'></a>
            </form>
            </div>
    END;
    } else if ($_SESSION['loggedIn'] == true) {
        printLogoutForm();
    }
    echo <<<END
    </div>
    </nav>
    END;
}
