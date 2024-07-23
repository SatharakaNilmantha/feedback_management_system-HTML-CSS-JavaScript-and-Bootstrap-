<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "student_feedback_management_system";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare SQL query
    $sql = "DELETE FROM Lecture_feedback WHERE Id = '$id';";

    // Use prepared statement to avoid SQL injection
    $stmt = $connection->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) 
    {
        die("Error preparing query: " . $connection->error);
    }

    
   // Bind parameter

    // Execute the statement
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    // Close statement
    $stmt->close();

    // Close connection
    $connection->close();

    // Redirect to mreport.php after deletion
    header('location:http://localhost/feedback_management/viewmylecfeedback.php');
    exit;

} 
else
{
    // Handle case when ID parameter is not set
    echo "ID parameter is missing.";
}
?>
