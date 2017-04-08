<?php
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;
?>
<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Browser Reporting Tool Confirmation</title>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">

</head>

<?php

require_once 'config.php';

if($_POST['ua'] != '') { // Check if the submission is coming from the form
	
	// Collect results
	
	$results = "";
	
	$results .= "User Agent: ".$_POST['ua']."\n\n";
	$results .= "JavaScript Enabled: ".$_POST['js']."\n\n";
	$results .= "IP Address: ".$_POST['ip']."\n\n";
	
	if(isset($_POST["modernizr"])) {
		$modernizr = json_decode($_POST["modernizr"], true);
		$results .= "Modernizr:\n\n".print_r($modernizr,true);
	}
	
	// Send the emails
	
	$client = new PostmarkClient(POSTMARK_TOKEN);
	
	$client->sendEmail(
	  NOREPLY_EMAIL,
	  TO_EMAILS,
	  'Browser Report - '.$_POST['name'],
	  nl2br($results)
	);
	
	// Confimration
	
	$confirmation_message = "<strong>Thank You!</strong> Your results have been sent to our team.";
	$confirmation_status = 'success';
		
} else {
	
	$confirmation_message = "Your results were incomplete. <a href=\"index.php\" class=\"alert-link\">Please submit the form again.</a>";
	$confirmation_status = 'danger';
	
}

?>

<body>

<div class="container">

<div class="page-header"><h1>Browser Reporting Tool</h1></div>

<div class="alert alert-<?php echo $confirmation_status; ?>" role="alert"><?php echo $confirmation_message; ?></div>

</div><!--.container-->

</body>

</html>