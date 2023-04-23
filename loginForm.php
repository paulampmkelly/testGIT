<?php
    session_start(); //start a session
    include("topImage.php"); //includes the topImage.php file in this one
?>

<!DOCTYPE html>
<html>
    <head>
        <title>A BASIC HTML LOGIN FORM</title>
    </head>
    <body>
        <form name ="form1" method = "post" action = "checkLogin.php"> <!--lab6: Part1, Point 8 -->
            <p>Username <input type = "text" name = "username" value = "" maxlength="20"/></p>
            <p>ID <input type = "text" name = "ID" value = "" maxlength="4"/></p>
            <p><input type = "submit" name = "submit" value = "login"></p>
        </form>

         <form name ="form1" method = "post" action = "checkLogin.php"> <!--lab6: Part1, Point 8 -->
            <p>Username <input type = "text" name = "username" value = "" maxlength="20"/></p>
            <p>ID <input type = "text" name = "ID" value = "" maxlength="4"/></p>
            <p><input type = "submit" name = "submit" value = "login"></p>
        </form>

            <?PHP
                if (isset($_SESSION['error'])) { // if there is an errorMessage session variable set
                   print($_SESSION['error']); //print the errorMessage session variable value
                   unset($_SESSION['error']); //unset the errorMessage variable
                }
            ?>
    </body>
</html>
