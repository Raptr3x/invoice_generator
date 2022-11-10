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

	include_once('database.php');

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
					window.location.href = 'react-invoice-generator/index.html';
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
	<nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center" style="width: 250px;">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <img id="logo-img" src="assets/logo_white.png">
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-white font-bold no-underline" href="/">Home</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">Templates</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#pricingSection">Pricing</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="login.php">Login</a>
            </li>
          </ul>
          <a href="register.php">
          <button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full lg:mt-0 py-4 px-8 shadow focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          Register today!
          </button></a>
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
	<div class="wrapper">
		<div class="container">
			<h1 class="logged-in m-2 fw-bolder text-white">Login</h1>
			<h1 class="welcome hidden fw-bolder text-white">Welcome!</h1>

			<p class="incorrect hidden">Incorrect email/password!</p>
			<form action="index.php" method="post" class="form">
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