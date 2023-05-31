<?php
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

$connect = mysqli_connect("localhost","root","","fypro");
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
	exit('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ) {
	exit('Please complete the registration form');
}

if ($stmt = $connect->prepare('SELECT user_id FROM user WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo '<script>alert("Username already exists, please choose another!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
		exit;
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement for username check!';
	exit;
}

if ($stmt = $connect->prepare('SELECT user_id FROM user WHERE email = ?')) {
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo '<script>alert("Email are incorrect, please enter a correct email!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
		exit;
	}
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo '<script>alert("Email already exists, please choose another!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
		exit;
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement for email check!';
	exit;
}

$verification_token = bin2hex(random_bytes(32));

if ($stmt = $connect->prepare('INSERT INTO user (username, email, password, verification_token) VALUES (?, ?, ?, ?)')) {
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('ssss', $_POST['username'], $_POST['email'], $password, $verification_token);
	$stmt->execute();
        $to = $_POST['email'];
        $subject = "Email Verification";
        $message = "Thank you for registering. Please click the following link to verify your email: \n";
        $message .= "http://localhost/FYP/verify.php?token=" . urlencode($verification_token);

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '1211204346@student.mmu.edu.my'; 
        $mail->Password = 'ckkubghtiqzgplmr'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;


        $mail->setFrom('1211204346@student.mmu.edu.my', 'Fypro'); 
        $mail->addAddress($to); 
        $mail->Subject = $subject; 
        $mail->Body = $message; 

        if ($mail->send()) {
            echo '<script>alert("Registration successful! Please verify your account in your email");</script>';
			echo '<script>window.location.href = "index.php";</script>';
        }
        
        else {
            echo "Error sending verification email: " . $mail->ErrorInfo;
        }
		echo '<script>alert("Registration successful!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
	$stmt->close();
} else {
	echo 'Could not prepare statement for user insertion!';
	exit;
}

$connect->close();

?>