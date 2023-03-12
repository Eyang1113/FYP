<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['aname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$aname = validate($_POST['aname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'aname='. $aname. '&name='. $name;


	if (empty($aname)) {
		header("Location: admin(signup).php?error=Username is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: admin(signup).php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: admin(signup).php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: admin(signup).php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: admin(signup).php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM admin WHERE admin_name='$aname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: admin(signup).php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO admin(admin_name, password, name) VALUES('$aname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: admin(signup).php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: admin(signup).php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: admin(signup).php");
	exit();
}