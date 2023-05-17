<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['aname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['aemail'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$aname = validate($_POST['aname']);
	$pass = validate($_POST['password']);
	$aemail = validate($_POST['aemail']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'aname='. $aname. '&name='. $name;


	if (empty($aname)) {
		header("Location: superadmin(signup).php?error=Username is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: superadmin(signup).php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: superadmin(signup).php?error=Re Password is required&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: superadmin(signup).php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($aemail)){
		header("Location: superadmin(signup).php?error=E-mail is required&$user_data");
	    exit();
	}
	else if($pass !== $re_pass){
        header("Location: superadmin(signup).php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM superadmin WHERE superadmin_name='$aname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: superadmin(signup).php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO superadmin(superadmin_name, superadmin_email, password, name) VALUES('$aname', '$aemail', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: superadmin(signup).php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: superadmin(signup).php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: superadmin(signup).php");
	exit();
}