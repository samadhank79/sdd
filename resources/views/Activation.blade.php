<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="" method="post" data-validate="parsley">
		@csrf
		<div class='row'>
			<!--	<label for='firstname'>First Name</label> -->
			<input type="text" placeholder="First Name" name='firstname' id='firstname' data-required="true" data-error-message="Your First Name is required" required>
		</div>
		<div class='row'>
			<!--	<label for="lastname">Last Name</label> -->
			<input type="text" placeholder="Last Name"  name='lastname' data-required="true" data-type="email" data-error-message="Your Last Name is required" required>
		</div>
		<div class='row'>
			<!--	<label for="email">Confirm your E-mail</label> -->
			<input type="text" placeholder="E-mail" name='email' data-required="true" data-error-message="Your E-mail must correspond" required>
		</div>
		<input type="submit" value="Activate" name="activate">
	</form>
</body>
</html>