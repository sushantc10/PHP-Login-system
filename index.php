<?php 
	//define config
	define('__CONFIG__',true);
	require_once('inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>
<body>

	<?php echo date('Y-m-d');?>
<!-- jQuery is required -->
	<p>
		<a href="php_login_system/login.php">Login</a>
		<a href="php_login_system/register.php">Register</a>
	</p>
<?php require_once('footer.php'); ?>
  

  </body>
</html>
