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

    // Fetch the User_Name from management_assistant table based on the given id
    $sqlFetch = "SELECT User_Name FROM lecture WHERE Lecture_Id = ?";
    $stmtFetch = $connection->prepare($sqlFetch);

    if ($stmtFetch === false) {
        die("Error preparing query: " . $connection->error);
    }

    $stmtFetch->bind_param("s", $id);

    if (!$stmtFetch->execute()) {
        die("Error executing query: " . $stmtFetch->error);
    }

    $resultFetch = $stmtFetch->get_result();
    if ($resultFetch->num_rows === 0) {
        die("No record found with the given ID.");
    }

    $rowFetch = $resultFetch->fetch_assoc();
    $User_Name = $rowFetch['User_Name'];

    $stmtFetch->close();

    // Prepare SQL query to delete from management_assistant table
    $sqlDeleteMA = "DELETE FROM lecture WHERE Lecture_Id = ?";
    $stmtDeleteMA = $connection->prepare($sqlDeleteMA);

    if ($stmtDeleteMA === false) {
        die("Error preparing query: " . $connection->error);
    }

    $stmtDeleteMA->bind_param("s", $id);

    if (!$stmtDeleteMA->execute()) {
        die("Error executing query: " . $stmtDeleteMA->error);
    }

    $stmtDeleteMA->close();

    // Prepare SQL query to delete from assistant_register table
    $sqlDeleteAR = "DELETE FROM lecture_register WHERE User_Name = ?";
    $stmtDeleteAR = $connection->prepare($sqlDeleteAR);

    if ($stmtDeleteAR === false) {
        die("Error preparing query: " . $connection->error);
    }

    $stmtDeleteAR->bind_param("s", $User_Name);

    if (!$stmtDeleteAR->execute()) {
        die("Error executing query: " . $stmtDeleteAR->error);
    }

    $stmtDeleteAR->close();

    // Close connection
    $connection->close();

    // Redirect to mreport.php after deletion
    header('Location: http://localhost/feedback_management/lecreport.php');
    exit;

} else {
    // Handle case when ID parameter is not set
    echo "ID parameter is missing.";
}
?>
