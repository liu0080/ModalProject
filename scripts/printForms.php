<?php
function printLoginForm($askedPage)
{
    echo <<<END
    <style>
    .container
    {
    width: 500px;
    margin-left: auto;
    margin-right: auto;
    }
    </style>
    <div class="container">
        <br><form action ='index.php?page=$askedPage&todo=login' method='POST'>
            <input class='form-control me-sm-2' type = 'text' placeholder='Login' name='login'>
            <input class='form-control me-sm-2' type = 'password' placeholder='Password' name='mdp'>
            </br>
            <center><button class='btn btn-primary' type='submit'>Sign in</button> you don't have account? <a href="index.php?page=register">Sign up</a></center>
    </div>
    END;
}
function printLogoutForm()
{
    echo <<<END
    <div style='text-align:right'>
        <a href='index.php?page=info&todo=logout'><input type ='submit' value='Disconnect' class ="btn btn-danger"></a>
        <a href='index.php?page=compte'><input type='button' value = 'Your account' class = "btn btn-primary"></a>
    </div>
    END;
}
