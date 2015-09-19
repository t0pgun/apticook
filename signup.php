<?php
session_start();
if(isset($_POST['submit']))
{
	$Name=htmlentities($_POST['Name']);
	$Email=htmlentities($_POST['Email']);
	$Pass=htmlentities($_POST['pass']);

	if(!$Email||!$Name||!$Pass)
	{echo ' <div class="alert alert-danger"><strong>Oh !</strong> Please fill every detail and then Try Again.</div>';
	}
 else
	{include 'db_login.php';
			$Name=mysql_real_escape_string($Name);
			$Email=mysql_real_escape_string($Email);
			$Pass=mysql_real_escape_string($Pass);
			$confirmcode=md5(uniqid(rand())); 
			$sql = mysql_query("insert into tempuser values ('".$confirmcode."', '".$Name."', '".$Email."', '".MD5($Pass.$quark)."');");
if($sql){
// send e-mail to ...
$to=$Email;

// Your subject
$subject="Your confirmation link for Apticook.tk !";

// From
$header="from: Rohit Mishra <accounts@apticook.tk>";

// Your message
$message="Hey ".$Name." ! \r\nWelcome to Apticook!\r\n Your Comfirmation link is here.\r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.apticook.tk/confirmation.php?passkey=".$confirmcode." \n";



// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if your email succesfully sent
if($sentmail){
echo "<div class='alert alert-success'>Your Confirmation link Has Been Sent To Your e-mail Address.</div>";
}
else {
echo "<div class='alert alert-danger'>Sorry, Cannot send Confirmation link to your e-mail address.</div>.";
}

}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="aptitude, apti ,maths,skills ,apticook,tests, nit jamshedpur,nitjsr, rohit mishra, companies,recruitment, mba ,improve, money, career, certificate" />
    <meta name="description" content="Practice, Compete, Achieve. Create an Account and test yourself in Aptitude for FREE!.">
    <meta name="author" content="rohitmishra.nitjsr@gmail.com">
    <link rel="shortcut icon" href="  docs-assets/ico/favicon.png">

    <title>AptiCook ~ Signup</title>

    <!-- Bootstrap core CSS -->
    <link href=" css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signup.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="  docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body background=" images/login.jpg">
	
    <div class="container">
      <form class="form-signin" action="<?php $_SERVER['PHP_SELF']; ?>" method='POST' role="form">
        <h2 class="form-signin-heading"><a href="#"><i >Sign up</a> <small>here or</small> <a href="index.php" >Log in</a></h2>
		<input type="text" name="Name" class="form-control" placeholder="Username" required >
        <input type="email" name="Email" class="form-control" placeholder="Email address" required >
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block"  name="submit" type="submit">Sign up&raquo;</button>
		
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
