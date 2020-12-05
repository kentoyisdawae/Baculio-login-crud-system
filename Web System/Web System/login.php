<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body
		{
			margin: 0;
			padding: 0;
			background-image: url(back1.jpeg);
			background-repeat: no-repeat;
			background-size: cover;
			font-family: sans-serif;
		}
		.Login
		{
			width: 320px;
			height: 420px;
			background: rgba(0,0,0,0.5);	
			color: #fff;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			box-sizing: border-box;
			padding: 70px 30px;
		}
		h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
		}
		.Login p
		{
			margin: 0;
			padding: 0;
			font-weight: bold;
		}
		.Login input
		{
			width: 100%;
			margin-bottom: 20px;
		}
		.Login input[type="text"], input[type="password"]
		{
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			height: 40px;
			color: #fff;
			font-size: 16px;
		}
		.Login input[type="submit"]
		{
			border: none;
			outline: none;
			height: 40px;
			background: blue;
			color: #fff;
			font-size: 18px;
			border-radius: 20px;
		}
		.Login input[type="submit"]:hover
		{
			cursor: pointer;
			background: #ffc107;
			color: #000;
		}
		.Login a
		{
			text-decoration: none;
			font-size: 12px;
			line-height: 20px;
			color: darkgrey;
		}
		.login a:hover
		{
			color: #ffc107;
		}
	</style>
</head>
	<script type="text/javascript">
		var user = [
		{

			username: "Admin"
			password: "Admin"

		}
	]
	function getInfo(){
		var username = document.getElementById("username").value
		var password = document.getElementById("password").value
		console.log("Your username is " + username + "and your password is " + password)
	}


	</script>
	<body>
		<div class="Login">
			<!-- <img src="user.png" class="avatar"> -->
			<h1>Login Here</h1>
			<form action="index2.html" method="GET">
				<p>Username</p>
				<input type="text" name="" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="" placeholder="Enter password">
				<input type="submit" name="" value="Login">
				<a href="https://www.google.com" target="_blank">Forgot Password?</a>
				<a href="https://www.facebook.com" target="_blank">Doesn't have an account?</a>
			</form>		
		</div>
	</body>
</html>