<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/style.css">
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Register | Invoicey</title>
</head>
<?php
if(isset($_POST['register'])){

	include_once('database.php');

	$conn = get_connection();
	$uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = md5($_POST['password']);
	isset($_POST['newsletter']) ? $newsletter = 1 : $newsletter = 0;
	
	// if email is taken, give a warning, not an error!
	insert($conn, 'users', "email, pswd, fullname, hasNewsletter", "'".$email."', '".$password."', '".$uname."', ".$newsletter);
?>
		<script type="text/javascript">
			window.addEventListener('load', function () {
				$('.welcome').fadeIn(1000);
				$('form').fadeOut(500);
				$('.logged-in').addClass('hidden');
				$('.wrapper').addClass('form-success');

				setTimeout(function() {
					window.location.href = 'index.php';
				}, 2000);
			})
		</script>
<?php
}
?>

<body>
	<div class="wrapper">
		<div class="container d-flex justify-content-center flex-column ">
			<h1 class="logged-in">Create an account</h1>
			<h1 class="welcome hidden">Account successfully registered!</h1>
			<p id="pass_nonmatch"></p>
			<form class="form align-self-center" action="register.php" method="post">
				<input name="uname" type="name" placeholder="Name" required>
				<input name="email" type="email" placeholder="E-mail" required>
				<input name="password" id="password" type="password" placeholder="Password" required>
				<input name="repassword" id="repassword" type="password" placeholder="Repeat your password" required>
				
				<div style="display: flex;">
					<input class="checkbox" type="checkbox" id="newsletter" name="newsletter">
					<label class="text-start text-break mt-3 m-2" for="newsletter">I want the Newsletter! (We won't send it too often)</label>
				</div>

				<input name="register" class="display-2" type="submit" id="register-button" value="register"></input>
			</form>

			<p class="logged-in">Have an account?</p>
			<a class="logged-in href="index.php">Login here!</a>
		</div>
		
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>
<script src="assets/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>