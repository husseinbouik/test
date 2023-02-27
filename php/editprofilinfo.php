<?php
require('connect.php');

// Retrieve user ID from the hidden field in the form
$userId = 1;
// $userId = $_POST['userId'];

// Retrieve user data from the database
// Replace with your own code to retrieve user data from the database
$dbh = new PDO("mysql:host=localhost;dbname=real_estate_agency", "root", "");
$stmt = $dbh->prepare("SELECT * FROM users WHERE id = :userId");
$stmt->bindParam(':userId', $userId);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Retrieve values from the form submission
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Check if the current password matches the one stored in the database
if ($currentPassword === $row['password']) {
  // Check if the new password and confirmation password fields are the same
  if ($newPassword === $confirmPassword) {

    // Update the user data in the database
    // Replace with your own code to update user data in the database
    $stmt = $dbh->prepare("UPDATE users SET first_name = :firstName, last_name = :lastName, phone_number = :phoneNumber, email_address = :email, password = :password WHERE id = :userId");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $newPassword);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    echo "User data updated successfully.";
    header("Location: profile.php");
    exit;

  } else {

    echo "New password and confirmation password fields do not match.";

  }

} else {

  echo "Current password is incorrect.";

}

?>
