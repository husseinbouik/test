<?php
require_once 'connect.php';

if (isset($_POST['delete'])) {
  try {
    $conn->beginTransaction(); // Begin the transaction

    // Get the property ID to delete from the form input
    $property_id = $_POST['property_id'];

    // Delete the images associated with the property from the images_gallery table
    $stmt = $conn->prepare("DELETE FROM images_gallery WHERE property_id = :property_id");
    $stmt->bindParam(':property_id', $property_id);
    $stmt->execute();

    // Delete the property from the real_estate_gallery table
    $stmt = $conn->prepare("DELETE FROM real_estate_gallery WHERE id = :property_id");
    $stmt->bindParam(':property_id', $property_id);
    $stmt->execute();

    // Commit the transaction
    $conn->commit();

    // Use HTTP status code to indicate success
    http_response_code(200);

    // Display success message
    echo "Property deleted successfully";
  } catch (PDOException $e) {
    // Rollback the transaction if an error occurred
    $conn->rollback();

    // Use HTTP status code to indicate error
    http_response_code(500);

    // Display error message
    echo "Error: " . $e->getMessage();
  }
}

// Close the prepared statement and database connection
$stmt = null;
$conn = null;
// Redirect to another PHP file
header("Location: profile.php");
exit;
?>
