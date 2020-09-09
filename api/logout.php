<?php

    // start session
    session_start();
    // Destroy all open sessions
    session_destroy();
    // locate to the login page
    header('location: ../login.php');

?>