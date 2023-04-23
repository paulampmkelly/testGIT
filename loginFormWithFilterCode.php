<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login page</title>

<script> //This is the client side form validation with Javascript
	//This code is executed on the client's browser
	/*function validateForm()
	{
		var x=document.getElementById("username").value;
		if (x==null || x=="") //check that the name field is not blank
	  	{
	  		alert("Your username must be filled out");
	  		return false;
	  	}
	 	var y =document.getElementById("password").value;
		if (y==null || y=="") //check that the project field is not blank
	  	{
	  		alert("Your password must be filled out");
	  		return false;
	  	}
	}*/
</script>

<?php //This is the server side form validation with PHP
    //This code executes on the web server
    //Write your server side form validation code here

	$usernameErr="";
	$username="";
	$passwordErr="";
	$password="";
    $emailErr="";
	$email="";
        
   if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//the rest of the PHP code goes here


		if (empty($_POST["uname"]))
    	{
    		$usernameErr = "Name is required";
    	} else
    	{
    		$username = checkUserData($_POST["uname"]);
    		if (!sanityCheck($username, 'string', 10)) //sanityCheck has failed, username is not of correct type and/or length
			{
			    $usernameErr = "Name is not of correct type or length";
			}
    	}

		if (empty($_POST["pwd"]))
    	{
    		$passwordErr = "Password is required";
    	} else {
    		$password = checkUserData($_POST["pwd"]);
    		if (!sanityCheck($password, 'numeric', 6)) //sanityCheck has failed, username is not of correct type and/or length
			{
				$passwordErr = "Password is not of correct type or length";
			}
    	}
		if (empty($_POST["email"]))
    	{
    		$emailErr = "Email is required";
    	} else {
    		$email = checkUserData($_POST["email"]);
            filter_var($email, FILTER_SANITIZE_EMAIL);
            
            // Validate e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo("$email is a valid email address");
            } else {
                $emailErr = "$email is not a valid email address";
                //echo("$email is not a valid email address");
            }    
        }
   	}

	function checkUserData($inputData)
	{
		$inputData = htmlspecialchars($inputData);
		$inputData = trim($inputData);
		$inputData = stripslashes($inputData);
		return $inputData;
	}

  function sanityCheck($data, $type, $length)
  {
	  // assign the type
	  $type = 'is_'.$type;

	  if(!$type($data))
		{
		return FALSE;
		}
	  // now we see if there is anything in the string
	  elseif(empty($data))
		{
		return FALSE;
		}
	  // then we check how long the string is
	  elseif(strlen($data) > $length)
		{
		return FALSE;
		}
	  else
		{
		// if all is well, we return TRUE
		return TRUE;
		}
	}

?>


</head>
<body>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return validateForm()">
Username: <input type="text" name="uname" id="username" value="<?php echo $username;?>"/><br/>
   <span class="error">* <?php echo $usernameErr;?></span>
   <br><br>
Password: <input type="text" name="pwd" id="password" value="<?php echo $password;?>"/><br/>
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
Email: <input type="text" name="email" id="email" value="<?php echo $email;?>"/><br/>
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>    
<input type="submit" value="Login"/>
<input type="Reset" value="Reset"/>
</form>

</body>
</html>
