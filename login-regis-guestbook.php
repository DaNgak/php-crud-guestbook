<!DOCTYPE html>
<html>
	<head>
		<title>Login & Register Form</title>
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="stylelogin.css" />
	</head>
	<body>
		<div class="container" id="container">
			<div class="form-container sign-up-container">
				<form action="" method="post">
					<h1>Sign Up Guestbook</h1>
					<!-- <div class="social-container">
						<a onclick="alert('Belum berfungsi')" class="social"><i class="fa fa-facebook"></i></a>
						<a onclick="alert('Belum berfungsi')" class="social"><i class="fa fa-google"></i></a>
						<a onclick="alert('Belum berfungsi')" class="social"><i class="fa fa-linkedin"></i></a>
					</div> -->
					<span>Form Registration</span>
					<input type="text" name="username" placeholder="Username" required/>
					<input type="email" name="email" placeholder="Email" required/>
					<input type="password" name="password" placeholder="Password" required/>
					<button type="submit" name="register">SignUp</button>
				</form>
			</div>
			<div class="form-container sign-in-container">
				<form action="" method="post">
					<h1>Sign In Guestbook</h1>
					<!-- <div class="social-container">
						<a onclick="alert('Belum berfungsi')" class="social"><i class="fa fa-facebook"></i></a>
						<a onclick="alert('Belum berfungsi')" class="social"><i class="fa fa-google"></i></a>
						<a onclick="alert('Belum berfungsi')" class="social"><i class="fa fa-linkedin"></i></a>
					</div> -->
					<span>Form Login</span>
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
					<!-- <a style="cursor: pointer;" onclick="alert('Belum berfungsi')">Forgot Your Password</a> -->
					<button type="submit" name="login">Sign In</button>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Tips</h1>
						<p>Gunakan lah email yang valid. Buatlah username yang mudah diingat dan tanpa menggunakan spasi, buatlah password dengan kombinasi angka dan huruf agar sulit ditebak</p>
						<button class="ghost" id="signIn">Sign In Guestbook</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Tips</h1>
						<p>Jangan beritahukan data pribadi anda, termasuk username dan password saat menggunakan semua sistem informasi</p>
						<button class="ghost" id="signUp">Sign Up Guestbook</button>
					</div>
				</div>
			</div>
		</div>
		<div class="move-page-navigation">
			Klik <a href="login-regis-user.php">disini</a> untuk registrasi / login user
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script type="text/javascript">
			const signUpButton = document.getElementById("signUp");
			const signInButton = document.getElementById("signIn");

			const container = document.getElementById("container");

			signUpButton.addEventListener("click", () => {
				container.classList.add("right-panel-active");
			});
			signInButton.addEventListener("click", () => {
				container.classList.remove("right-panel-active");
			});
		</script>
	</body>
</html>