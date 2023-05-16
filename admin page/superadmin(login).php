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
		header("Location: superadmin(index).php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: superadmin(index).php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM superadmin WHERE superadmin_name='$aname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['superadmin_name'] === $aname && $row['password'] === $pass) {
            	$_SESSION['superadmin_name'] = $row['superadmin_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['superadmin_id'] = $row['superadmin_id'];
				$_SESSION['superadmin_email'] = $row['superadmin_email'];
            	header("Location: superadmin(home).php");
		        exit();
            }else{
				header("Location: superadmin(index).php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: superadmin(index).php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: superadmin(index).php");
	exit();
}