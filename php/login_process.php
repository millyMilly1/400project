<?php

include 'db_connection.php';


session_start();


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
    
        $_SESSION['username'] = $username;
        $_SESSION['first_name'] = $row['first_name'];
        
        
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "User not found!";
}


mysqli_close($conn);
?>
