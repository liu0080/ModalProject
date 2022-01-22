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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/5/minty/bootstrap.css" rel="stylesheet">
    <link href="http://code.jquery.com/jquery-3.6.0.min.js" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
</head>
<a name="totop"></a>
<body>
END;
}

function generateHTMLFooter()
{
    echo <<<END
    <!-- Footer -->
<footer class="bg-white">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-4"><img src="img/logo.jpeg" alt="" width="150" class="mb-3">
                <p class="font-italic text-muted"><b>CrossFit BlaBlaBla</b></p>
            </div>
            <div class="col-lg-4">
                <h5 class="text-uppercase font-weight-bold mb-4">CrossFit</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="" class="text-muted">Our Team</a></li>

                        <li class="mb-2"><a href="#" class="text-muted">Our Policy</a></li>
                    </ul>
            </div>
            <div class="col-lg-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Quick Contacts</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-muted">+33 669507899</a></li>
                        <li class="mb-2"><a href="https://webmail.polytechnique.fr/" class="text-muted">Email</a></li>
                    </ul>
                    <h5>Social Links</h5>
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

$pageList = array(
    array(
        "name" => "homepage",
        "title" => "Accueil de notre site",
        "menutitle" => "Homepage"
    ),
    array(
        "name" => "register",
        "title" => "Inscription",
    ),
    array(
        "name" => "compte",
        "title" => "Mon compte",
    ),
    array(
        "name" => "signin",
        "title" => "Signin"
    ),
    array(
        "name" => "ourteam",
        "title" => "Our Team",
        "menutitle" => "Our Team"
    ),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Contact us"
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
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
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
            echo "
                    <li class='nav-item $active'>
                        <a class='nav-link active' href='index.php?page={$page['name']}'>{$page["menutitle"]}<span class='sr-only'></span></a>
                    </li>";
        }
    }
    echo <<<END
                </ul>
                <a href='index.php?page=signin'><input type='button' value = 'Sign in' class='btn btn-outline-light my-2 my-sm-0'></a>
                </div>
                </nav>
    END;
}

