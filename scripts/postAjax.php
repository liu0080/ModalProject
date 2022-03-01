<?php
require('../classes/database.php');
require('../classes/demande_registration.php');
require('../classes/utilisateurs.php');
require('../classes/event.php');

$dbh = Database::connect();

if (isset($_POST['acceptID'])) {        // accept demand of registration
    $user = Demande::getUtilisateur($dbh, $_POST['acceptID']);
    Utilisateur::insererUtilisateur($dbh, $user->login, $user->mdp, $user->nom, $user->prenom, $user->promotion, $user->email);
    Demande::deleteUtilisateur($dbh, $user->login);
    echo $user->login;
}

if (isset($_POST['rejectID'])) {        // reject demand of registration
    Demande::deleteUtilisateur($dbh, $_POST['rejectID']);
}
if (isset($_POST['deleteID'])) {        // delete user
    Utilisateur::deleteUtilisateur($dbh, $_POST['deleteID']);
}
if (isset($_POST['eventID'])) {         // delete event
    Event::deleteEvent($dbh, $_POST['eventID']);
}
if (isset($_POST['promotID'])) {        // promote a non-admin
    Utilisateur::updateAdmin($dbh, $_POST['promotID']);
}
$dbh = null;
