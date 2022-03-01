<?php

session_name("laychiva");
session_start();

require('scripts/utils.php');
require('classes/database.php');
require('classes/utilisateurs.php');

$dbh = Database::connect();

if (array_key_exists('todo', $_GET) && $_GET['todo'] == 'login') {
    logIn($dbh);
}
if (array_key_exists('todo', $_GET) && $_GET['todo'] == 'logout') {
    logOut($dbh);
}
$askedPage = 'homepage';
if (array_key_exists('page', $_GET)) {
    $askedPage = $_GET['page'];
}
if (!checkPage($askedPage)) {
    $askedPage = "homepage";
}
generateHTMLHeader(getPageTitle($askedPage));
generateMenu($askedPage);
require("content/contenu_$askedPage.php");

generateHTMLFooter();
$dbh = null;
