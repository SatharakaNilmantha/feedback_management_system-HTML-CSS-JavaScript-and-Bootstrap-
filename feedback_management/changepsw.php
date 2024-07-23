<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_feedback_management_system";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$User_Name = "";
$Password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read all rows from database
    $sql = "SELECT * FROM assistant_register WHERE User_Name = '$User_Name';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM management_assistant WHERE User_Name = '$User_Name';";
    $result1 = $connection->query($sql1);
    $row1 = $result1->fetch_assoc();
} else {
    // POST method: Update the password
    $User_Name = $_POST["user_name"];
    $Password = $_POST["current_psw"];
    $New_Password = $_POST["new_psw"];
    $Confirm_Password = $_POST["confirm_psw"];

    do {
        // Check if the current password matches the one in the database
        $sql = "SELECT * FROM assistant_register WHERE User_Name = '$User_Name' AND Password = '$Password';";
        $result = $connection->query($sql);
        if ($result->num_rows == 0) {
            $errorMessage = "Current password is incorrect.";
            break;
        }

        $sql1 = "SELECT * FROM management_assistant WHERE User_Name = '$User_Name' AND Password = '$Password';";
        $result1 = $connection->query($sql1);
        if ($result1->num_rows == 0) {
            $errorMessage = "Current password is incorrect.";
            break;
        }

        // Check if the new password matches the confirm password
        if ($New_Password !== $Confirm_Password) {
            $errorMessage = "New password and confirm password do not match.";
            break;
        }

        // Update the password
        $sql = "UPDATE assistant_register SET Password = '$New_Password' WHERE User_Name = '$User_Name';";
        $result = $connection->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $sql1 = "UPDATE management_assistant SET Password = '$New_Password' WHERE User_Name = '$User_Name';";
        $result1 = $connection->query($sql1);
        if (!$result1) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        header("location:/feedback_management/index.php");
        

        break;
    } while (false);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="css/changepsw.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="body container">

            
  <!------- section-->          

<div class="border bod" style="box-shadow: 5px 10px 18px #888888;">
    <div class="container row">
        <div class="col-4 py-4 ms-5">
            <img src="icon/logo1.png" class="icon" alt="">
        </div>
        <div class="col-6 py-5">
            <h1 class="font">SUNGLOW UNIVERSITY</h1>
            <h2 class="font1">Faculty of Engineering</h2>
        </div>
    </div>
    <div>
        <img src="image/update1.jpg" alt="" class="image1">
        <div class="row container my-4 all" style="margin-bottom:50px">
            <div class="form-style container border col-5 ms-5 py-3" id="myForm" style="box-shadow: 5px 10px 18px #888888;">
                <form class="form-container" method="post">
                    <h2 style="text-align: center;padding-top: 20px;"><em>CHANGE PASSWORD</em></h2>
                    
                    <label for="user_name" class="py-2" ><b>User Name:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="user_name" required>

                    <label for="current_psw" class="py-2" style="padding-top: 20px !important"><b>Current Password:</b></label>
                    <input type="password" class="form-control" placeholder="Enter Current Password" name="current_psw" required>

                    <label for="new_psw" class="py-2" style="padding-top: 20px !important"><b>New Password:</b></label>
                    <input type="password" class="form-control" placeholder="Enter New Password" name="new_psw" required>

                    <label for="confirm_psw" class="py-2" style="padding-top: 20px !important"><b>Confirm Password:</b></label>
                    <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_psw" required>
                    
                    <div class="py-1 " style="padding-top:10px;">
                        <button type="submit" class="btn btn-primary col-3 butt1" id="submit">Update</button>
                    </div>
                     
                   
                </form>
            </div>
            <div class="col-7 ps-5 py-3">
                <img src="image/update.jpg" alt="" class="image">
            </div>
        </div>
    </div>
      <div  style="position: absolute; left: 750px; top:500px;height:auto !important; width:auto !important">
      <?php

                      if (!empty($errorMessage)) 
                      {
                          echo "
                          <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                              <strong>$errorMessage</strong>
                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                          </div>
                          ";
                      }
                      ?>
                      


      </div>
</div>

</body>
</html>
