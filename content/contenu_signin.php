<?php
if (!array_key_exists('loggedIn', $_SESSION) || !$_SESSION['loggedIn']) {
    printLoginForm($askedPage);
}
