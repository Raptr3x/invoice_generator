<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/style.css">
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="assets/main.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
	<title>Login | Invoicey</title>
</head>

<?php

if(isset($_POST['login'])){

	include_once('./src/database.php');

	$conn = get_connection();

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = md5($_POST['pass']);
	
	$db_user = select_cond($conn, "users", "email='".$email."' AND pswd='".$password."'");

	if($db_user!=null){
		setcookie("login_cookie",$db_user[0]['recovery'],time() + 7200);
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
				$('.incorrect').removeClass('hidden');
			})
		</script>
		<?php
	}
}
?>
<body>
	<?php require_once("templates/nav.php"); ?>
	<div class="wrapper">
		<div class="container">
			<h1 class="logged-in m-2 fw-bolder text-white">Login</h1>
			<h1 class="welcome hidden fw-bolder text-white">Welcome!</h1>

			<p class="incorrect hidden">Incorrect email/password!</p>
			<form action="login.php" method="post" class="form">
				<input class="placeholder-white" name="email" type="text" placeholder="E-mail">
				<input class="placeholder-white" name="pass" type="password" placeholder="Password">
				<input class="placeholder-white" type="submit" name="login" id="login-button" value="Login"></input>
				<!-- <div class="d-flex mt-2">
					<input class="checkbox me-2 mb-0" type="checkbox" id="logged-in" name="logged-in">
					<label class="text-start" for="logged-in">Stay logged in</label>
				</div> -->
			</form>

			<p class="logged-in fw-bolder text-white">Don't have an account?</p>
			<a class="logged-in fw-bolder text-white" href="register.php">Create one now!</a>
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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>