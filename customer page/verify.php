<?php

$db_name = 'mysql:host=localhost;dbname=fypro';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);



if (isset($_GET['token'])) {
    $verification_token = $_GET['token'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE verification_token = :verification_token");
    $stmt->bindParam(':verification_token', $verification_token);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        $stmt = $conn->prepare("UPDATE user SET verified = 1 WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user['user_id']);

        if ($stmt->execute()) {
            echo "Email verification successful! You can now login.";
            header("Location: index.php");
        } 
        
        else {
            echo "Error updating user verification status";
        }
    } 
    
    else {
        echo "Invalid verification token";
    }
} 

else {
    echo "Invalid verification token";
}
?>