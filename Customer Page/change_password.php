<?php 
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
</head>
<body>
<?php
        include('header.php');
    ?>
	<div class="sidebar-profile">
			<div class="sidebar">
				<ul>
					<li><a href="user_profile.php"><p>Account Information</p></a></li>
					<li><a href="edit_profile.php"><p>Edit Profile</p></a></li>
					<li><a href="change_password.php"><p>Change Password</p></a></li>
				</ul>
			</div>
		</div>

	<div class="change-password">
		<form action="change_psw.php" method="post">
			<h1>Change Password</h1><hr>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<label>Old Password</label>
			<input type="password" 
				name="old-password"
				id="old-password" 
				placeholder="Old Password">
				<br>

			<label>New Password</label>
			<input type="password" 
				name="new-password"
				id="new-password" 
				placeholder="New Password"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
				required>
				<br>

			<label>Confirm New Password</label>
			<input type="password" 
				name="confirm-new-password"
				id="confirm-new-password" 
				placeholder="Confirm New Password"
				required>
				<br>

			<button type="submit" id="submit">Save Password</button>
			<script>
                var password1 = document.getElementById("new-password");
                var password2 = document.getElementById("confirm-new-password");
                var submit = document.getElementById("submit");

            submit.onclick = function(){
           if(password1.value != password2.value){
             alert("Error! Confirm password not match");
             return false;
           }
         }
            
        </script>
		</form>
	</div>
</body>
</html>
