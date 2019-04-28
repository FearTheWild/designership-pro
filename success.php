<?php
  if(!empty($_GET['tid'])) {
    $GET = filter_var_array($GET, FILTER_SANITIZE_STRING);
    
    $tid = $GET['tid'];
  } else {
    header('Location: index.php');
  }
?>

<!doctype html>
<html class="" lang="en">
<head>
	<meta charset="utf-8">
	<title>Thank you for signing up! - The Designership</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="favicon/png" href="favicon.png">
</head>
<body>
  <h2>Thank you for signing up to The Designership Pro</h2>
  <hr>
  <p>Your transaction ID is <?php echo $tid; ?></p>
  <p>Please check your email for confirmation.</p>
  <p><a href="index.php">Go back</a></p>
</body>
</html>
