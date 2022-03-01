<?php
if (!array_key_exists('loggedIn', $_SESSION) || !$_SESSION['loggedIn']) {
    printLoginForm($askedPage);
} else{     // if the user has already logged in, the page signin will redirect to homepage
    echo "<script>
            parent.location.href = 'index.php?page=homepage';
        </script>
        "; 
}
