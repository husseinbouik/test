<?php
  // Start a session to store user information
  session_start();
  // include ("connect.php");
  $error = ""; 

  // //Connect to the MySQL database
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "real_estate_agency";
  // $conn = new mysqli($servername, $username, $password, $dbname);

  // // Check for errors connecting to the database
  // if ($conn->connect_error) {
  //   die("Connection failed: " . $conn->connect_error);
  // }
  require "connect.php";

  // Get the email and password submitted from the login form
  $email = isset($_POST['Email']) ? $_POST['Email'] : '';
  $password = isset($_POST['Password']) ? $_POST['Password'] : ''; 
  $hashed_password = MD5($password);

  if(!empty($email) && !empty($password)){
  // Query the database for a user with the submitted email and password
  $sql = "SELECT * FROM `users` WHERE `email_address`='$email' AND `password`='$hashed_password'";

  $result = $conn->query($sql)->fetch();

  // Check if the query returned a result
  if (!empty($result)) {
    // Login successful, set session variables and redirect to home page
    $_SESSION['user_email'] = $result['email_address'];
    header("Location: user.php");
  } else {
    // Login failed, redirect back to login page with error message
      $error = "Email or Password is invalid";
      header("location: Account.php?error=".urlencode($error)); 

  }
}
