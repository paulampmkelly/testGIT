<?php
    //lab6: Part3, Point 1
	session_start();
    session_destroy(); //destroy the session
    header('Location: loginForm.php'); //redirect to the login page
?>