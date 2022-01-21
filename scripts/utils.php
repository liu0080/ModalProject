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
    <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/5/minty/bootstrap.css" rel="stylesheet">
    <link href="http://code.jquery.com/jquery-3.6.0.min.js" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
</head>
<body>
END;
}

function generateHTMLFooter()
{
    echo <<<END
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
        "name" => "schedule",
        "title" => "Schedule",
        "menutitle" => "Schedule"
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
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">CrossFit</a>
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
