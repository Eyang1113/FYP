<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['aname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$aname = validate($_POST['aname']);
	$pass = validate($_POST['password']);

	if (empty($aname)) {
		header("Location: admin(index).php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: admin(index).php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM admin WHERE admin_name='$aname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_name'] === $aname && $row['password'] === $pass) {
            	$_SESSION['admin_name'] = $row['admin_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['admin_id'] = $row['admin_id'];
            	header("Location: admin(home).php");
		        exit();
            }else{
				header("Location: admin(index).php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: admin(index).php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: admin(index).php");
	exit();
}