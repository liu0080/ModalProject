<?php
if (array_key_exists('loggedIn', $_SESSION) && $_SESSION['loggedIn']) {
    printLogoutForm();
} else {
    printLoginForm($askedPage);
}
