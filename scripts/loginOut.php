<?php
function logIn($dbh)
{
    if (array_key_exists('login', $_POST) && array_key_exists('mdp', $_POST)) {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $user = Utilisateur::getUtilisateur($dbh, $login);
        if ((!$user == null) && $user->testerMDP($dbh, $mdp)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['login'] = $login;
        }
    }
}
function logOut()
{
    $_SESSION['loggedIn'] = false;
    unset($_SESSION['login']);
}
