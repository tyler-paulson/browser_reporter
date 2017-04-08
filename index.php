<!DOCTYPE html>

<html lang="en" class="no-js">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Browser Reporting Tool</title>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
	
	<script src="modernizr.js"></script>

</head>

<body>

<div class="container">

<div class="page-header"><h1>Browser Reporting Tool</h1></div>

<p class="lead">Please fill out your name and press submit to send us details on the web browser you are using. This will help us better diagnose your problem.</p>

<form action="submit.php" method="POST">
	
	<div class="form-group">
		<label for="name">Your Name</label>
		<input id="name" name="name" type="text" class="form-control input-lg" required="required" placeholder="John Hancock">
	</div>
	
	<div class="form-group">
		<label for="ip">IP Address</label>
		<input id="ip" name="ip" type="text" class="form-control" readonly="readonly" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
	</div>
	
	<div class="form-group">
		<label for="ua">User Agent</label>
		<input id="ua" name="ua" type="text" class="form-control" readonly="readonly" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>">
	</div>
	
	<div class="form-group">
		<label for="js">JavaScript Enabled</label>
		<input id="js" name="js" type="text" value="No" class="form-control" readonly="readonly">
	</div>
		
	<input id="modernizr" name="modernizr" type="hidden">
	
	<div class="form-group"><button type="submit" class="btn btn-primary">Submit</button></div>
	
</form>

</div><!--.container-->

<script>

// Create a duplicate Modernizr Object that we can modify and submit

var modernizrResults = Modernizr;

// Delete properties we don't want to report

delete modernizrResults._version;
delete modernizrResults._prefixes;
delete modernizrResults._domPrefixes;
delete modernizrResults._cssomPrefixes;

// Modify the form

document.getElementById('js').value = 'Yes';

if (typeof JSON.stringify == 'function') {
	document.getElementById('modernizr').value = JSON.stringify(modernizrResults);	
}

</script>

</body>

</html>