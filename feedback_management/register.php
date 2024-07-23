<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_feedback_management_system";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) 
{
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_SESSION["User_Name"])) {
    header('location:/feedback_management/loging.php');
    exit;
}

$First_Name = "";
$Last_Name = "";
$User_Name = "";
$Password = "";

$First_Name_error = "";
$Last_Name_error = "";
$User_Name_error = "";
$Password_error = "";
$CPassword_error = "";

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $First_Name = $_POST["Fname"];
    $Last_Name = $_POST["Lname"];
    $User_Name = $_POST["Uname"];
    $Password = $_POST["psw"];
    $CPassword = $_POST["cpsw"];

    if (empty($First_Name)) {
        $First_Name_error = "First name is required";
        $error = true;
    }

    if (empty($Last_Name)) {
        $Last_Name_error = "Last name is required";
        $error = true;
    }

    if (empty($User_Name)) {
        $User_Name_error = "User name is required";
        $error = true;
    }

    if (empty($Password)) {
        $User_Password_error = "Password is required";
        $error = true;
    }

    if ($CPassword != $Password) {
        $CPassword_error = "Password and confirm password do not match";
        $error = true;
    }

    if (!$error) {
        // Check if the user details match an entry in the management_assistant table
        $Statement = $connection->prepare("SELECT Id FROM management_assistant WHERE User_Name = ? AND Password = ? AND First_Name = ? AND Last_Name = ? ");
        if ($Statement) 
        {
            $Statement->bind_param('ssss', $User_Name, $Password, $First_Name, $Last_Name,);
            $Statement->execute();
            $Statement->store_result();
            if ($Statement->num_rows == 0) {
                $User_Name_error = "User details does not enter the system ";
                $error = true;
            }
            $Statement->close();
        } 
        
                 // Check if the user details  in the assistant_register table
         $Statement = $connection->prepare("SELECT id FROM assistant_register WHERE User_Name = ? AND Password =? AND First_Name = ? AND Last_Name = ?");
            if ($Statement) 
            {
                $Statement->bind_param('ssss', $User_Name,$Password, $First_Name, $Last_Name);
                $Statement->execute();
                $Statement->store_result();
              
                if ($Statement->num_rows != 0) 
                 {
                    $User_Name_error = "User alrady registered !! ";
                    $error = true;
                 }
                
                 $Statement->close();
            } 
                    
         else 
         {
             die("Prepare statement failed: " . $connection->error);
         }

        if (!$error) 
        {
           

            // Insert into assistant_register table
            $Statement = $connection->prepare(
                "INSERT INTO assistant_register (First_Name, Last_Name, User_Name, Password) VALUES (?, ?, ?, ?)"
            );
            if ($Statement) {
                $Statement->bind_param('ssss', $First_Name, $Last_Name, $User_Name, $Password);
                $Statement->execute();
                $insert_id = $Statement->insert_id;
                $Statement->close();

                $_SESSION["id"] = $insert_id;
                $_SESSION["First_Name"] = $First_Name;
                $_SESSION["Last_Name"] = $Last_Name;
                $_SESSION["User_Name"] = $User_Name;

                header('location:/feedback_management/loging.php');
                exit;
            } else {
                die("Prepare statement failed: " . $connection->error);
            }
        }
    }
}
?>



<!DOCTYPE html>
<html >
    <head>
        <title>register form</title>
        <link rel="stylesheet" type="text/css" href="css/register.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>

    <body class=" body container ">

    <div class="border bod"style="box-shadow: 5px 10px 18px #888888; height: 980px;">
    <div class=" container  row "style="margin-top: 25px;">  
      <div  class=" col-4 py-3 ms-5 ">
        <img src="icon/logo1.png" class="icon" alt="">
      </div>

       <div class=" col-6 py-4 " >
        <h1 class="font ">SUNGLOW UNIVERSITY </h1>
        <h2 class="font1">Faculty of Engineering</h2>
     </div>
    </div> 

      
    <div >

        <img src="image/registration.jpg" alt="" class="image1 " >
        <div class=" row container my-3 all "style="margin-bottom:50px">
        
              <div class=" form-style container border col-5 ms-5 py-3" id="myForm" style="box-shadow: 5px 10px 18px #888888;">
                 
                 
                  <form  class="form-container" method="post" >
  
                    <h2 style="text-align: center;"><em>Student Attendent manegment system</em></h2>

                    <label for="name" class="  py-3"><b>First Name</b></label>
                    <input type="text" class="form-control  " placeholder="Enter First Name" name="Fname" value="<?=$First_Name ?>" >
                    

                    <label for="name" class="  py-3"><b>Last Name</b></label>
                    <input type="text" class="form-control  " placeholder="Enter Last Name" name="Lname" value="<?=$Last_Name ?>" >
                    

                    <label for="name" class="  py-3"><b>user Name</b></label>
                    <input type="text" class="form-control  " placeholder="Enter User Name" name="Uname" value="<?=$User_Name ?>" >
                    

                    <label for="psw" class="  py-3"><b>Password</b></label>
                    <input type="password" class="form-control  " placeholder="Enter Password" name="psw" value="<?=$Password; ?>"  >
                    

                    <label for="cpsw" class="  py-3"><b>Comfirm Password</b></label>
                   <input type="password" class="form-control  " placeholder="Enter Comfirm Password" name="cpsw" value="<?php   $CPassword; ?>" > 
                   

                   <div class="py-3  my-1"></div>

                    <a class="col-6 ms-5 me-5" href="loging.php">Back</a>
                    <button type="submit" class="btn btn-primary  col-4 ms-5 my-2 " >Register</button>
                    

                  </form>

                   
                  
              </div>

             

              <div class=" col-7 ps-5 py-3 ">


                <img src="image/shutterstock_257823118-1.jpg" alt="" class="image" >
              </div>
              <div class="p-2 border " style="position: absolute; left: 800px; top:300px;background-color:rgba(239, 225, 225, 0.463); height:auto; width:auto">
                  <p><span class="text-danger " style="font-weight: 1000;"><?= $First_Name_error?></span></p>
                  <p><span class="text-danger " style="font-weight: 1000;"><?= $Last_Name_error?></span></p>
                  <p><span class="text-danger " style="font-weight: 1000;"><?= $User_Name_error?></span></p>
                  <p><span class="text-danger " style="font-weight: 1000;"><?= $Password_error ?></span></p>
                  <p><span class="text-danger " style="font-weight: 1000;"><?= $CPassword_error?></span></p>
                </div>
          
        </div> 
  
         
      </div>



</div>  
        
    </body>
</html>