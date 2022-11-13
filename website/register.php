<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/style.css">
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
	<title>Register | Invoicey</title>
</head>
<?php
if(isset($_POST['register'])){

	session_start();

	include_once('./src/database.php');

	$conn = get_connection();
	$uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = md5($_POST['password']);
	isset($_POST['newsletter']) ? $newsletter = 1 : $newsletter = 0;
	
	// if email is taken, give a warning, not an error!
	$row = select_cond($conn, 'users', 'email="'.$email.'"');
	if(!$row){
		insert($conn, 'users', "email, pswd, fullname, hasNewsletter", "'".$email."', '".$password."', '".$uname."', ".$newsletter);
		?>
			<script type="text/javascript">
				window.addEventListener('load', function () {
					$('.welcome').fadeIn(1000);
					$('form').fadeOut(500);
					$('.logged-in').addClass('hidden');
					$('.wrapper').addClass('form-success');

					setTimeout(function() {
						window.location.href = '/app/';
					}, 2000);
				})
			</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			window.addEventListener('load', function () {
				$('#display_error').html('E-mail already in use').addClass('incorrect');
			})
		</script>
		<?php
	}
}
?>

<body>	
	<?php require_once("templates/nav.php"); ?>
	<div class="wrapper">
	<div class="text-center z-10 p-8 opacity-86" style="background-color: #46353566">
			<h1 class="logged-in fw-bolder text-white display-text">Register</h1>
			<h1 class="welcome hidden text-white display-text">Account successfully registered!</h1>
			<p id="display_error"></p>
			<form class="form align-self-center" action="register.php" method="post">
				<input class="placeholder-white" name="uname" type="name" placeholder="Name" required>
				<input class="placeholder-white" name="email" type="email" placeholder="E-mail" required>
				<input class="placeholder-white" name="password" id="password" type="password" placeholder="Password" required>
				<input class="placeholder-white" name="repassword" id="repassword" type="password" placeholder="Repeat your password" required>
				
				<div style="display: flex;">
					<input class="checkbox" type="checkbox" id="newsletter" name="newsletter">
					<label class="text-start text-white text-break mt-3 m-2" for="newsletter">I want the Newsletter! (We won't send it too often)</label>
				</div>

				<input name="register" class="display-2" type="submit" id="register-button" value="register"></input>
			</form>

			<p class="logged-in fw-bolder text-white">Have an account?</p>
			<a class="logged-in fw-bolder underline text-blue-400" href="login.php">Login here!</a>
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
	<script src="assets/main.js"></script>
</body>
</html>