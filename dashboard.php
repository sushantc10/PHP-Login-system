<?php 
	//define config
	define('__CONFIG__',true);
	require_once('inc/config.php');	
	echo $_SESSION['user_id'].' is your user id';

	
	Page::ForceLogin();
//echo gettype($_SESSION['user_id']);
	$User = new User($_SESSION['user_id']);
	
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

	<div class = "uk-section uk-container">
		<h2>Dashboard</h2>
		<p>Hello <?php $User->email;?>, Your registered at <?php echo $User->reg_time;?></p>
	</div>

<?php require_once('footer.php'); ?>
  

  </body>
</html>
