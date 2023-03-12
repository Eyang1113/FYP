<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" href="style(LoginRegisterCPassword).css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="body">
		<form action="admin(login).php" method="post">
			<h2>LOGIN(admin)</h2>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<label>Username</label>
			<input type="text" name="aname" placeholder="Username"><br>

			<label>Password</label>
			<input type="password" name="password" placeholder="Password"><br>

			<button type="submit">Login</button>
			<a href="admin(signup).php" class="ca">Create an account</a>
		</form>
	</div>
</body>
</html>