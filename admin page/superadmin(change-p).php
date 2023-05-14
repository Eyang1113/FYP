<?php 
session_start();

if (isset($_SESSION['superadmin_id']) && isset($_SESSION['superadmin_name'])) {

    include "db_conn.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: superadmin(change-password).php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: superadmin(change-password).php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: superadmin(change-password).php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $superadmin_id = $_SESSION['superadmin_id'];

        $sql = "SELECT *
                FROM superadmin WHERE 
                superadmin_id='$superadmin_id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE superadmin
        	          SET password='$np'
        	          WHERE superadmin_id='$superadmin_id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: superadmin(change-password).php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: superadmin(change-password).php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: superadmin(change-password).php");
	exit();
}

}else{
     header("Location: superadmin(index).php");
     exit();
}