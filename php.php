<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

//Database connection
$con = new mysqli ("localhost", "root", "", "contritok");
if($con->connect_error) {
    die("Failed to connect : " .$con->connect_error);
}else {
    $stmt = $con->prepare("SELECT * FROM tblregistration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if(data['password'] === $password) {
            echo "<h2> Log In Successfully </h2>";
        }
        else {
            echo "<h2> Invalid Email or Pasword </h2>";
        }
    } else{
        echo "<h2> Invalid Email or Pasword </h2>";
    }
}




?>