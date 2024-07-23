
<?php
 

if (isset($_SESSION["User_Name"])) {
    header('Location: /feedback_management/index.php');
    exit;
}

$User_Name = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $User_Name = $_POST['uname'];
    $Password = $_POST['psw'];

    if (empty($User_Name) || empty($Password)) {
        $error = "Username and password are required";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "student_feedback_management_system";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $Statement = $connection->prepare(
            "SELECT id, First_Name, Last_Name, User_Name, Password FROM assistant_register WHERE User_Name = ? AND Password = ?"
        );

        $Statement->bind_param("ss", $User_Name, $Password);
        $Statement->execute();
        $Statement->bind_result($id, $First_Name, $Last_Name, $User_Name, $Password);

        if ($Statement->fetch()) {
            $_SESSION["id"] = $id;
            $_SESSION["First_Name"] = $First_Name;
            $_SESSION["Last_Name"] = $Last_Name;
            $_SESSION["User_Name"] = $User_Name;

            header('Location: /feedback_management/index.php');
            exit();



        } else {
            $error = "Username or Password invalid";
        }

        $Statement->close();
        $connection->close();
    }
}
?>




<!DOCTYPE html>
<html >
    <head>
        <title>Loging form</title>
        <link rel="stylesheet" type="text/css" href="css/loging.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>

    <body class="body container ">

  <div class="border bod" style="box-shadow: 5px 10px 18px #888888;">
    <div class=" container  row ">  
      <div  class=" col-4 py-3 ms-5 ">
        <img src="icon/logo1.png" class="icon" alt="">
      </div>

       <div class=" col-6 py-4 " >
        <h1 class="font ">SUNGLOW UNIVERSITY </h1>
        <h2 class="font1">Faculty of Engineering</h2>
     </div>
    </div> 

    <div >

        <div class=" row container my-3  "style="margin-bottom:50px ;padding-bottem:40px">
         
  
              <div class=" form-style container border col-5 ms-5 py-2 my-1" id="myForm" style="box-shadow: 5px 10px 18px #888888;">
                  <form  class="form-container" method="post" >
  
                    <h2 style="text-align: center;"><em>Student Feedback Manegment System</em></h2>
  
  
                    <label for="uname" class="  py-3"><b>User Name</b></label>
                    <input type="text" class="form-control  " placeholder="Enter User Name" name="uname" value="<?=$User_Name ?>">
                
                    <label for="psw" class="  py-3"><b>Password</b></label>
                    <input type="password" class="form-control  " placeholder="Enter Password" name="psw" >
  
                    
                    <button type="submit" class="btn btn-primary col-12  butt1" >Sign in</button>

                 <div>
                    <h2 style="text-align: center;font-size: 20px;" class="my-3"><strong>you don't have account?</strong></h2>

                    <a class="btn btn-primary col-3  butt2" href="register.php" role="button">Register</a>
                    
                 </div>

                  </form>

              </div>

              <div class=" col-7 ps-5 py-3 ">
                <img src="image/login.jpg" alt="" class="image" style="box-shadow: 5px 10px 18px #0e015a60;opacity: 0.5;">
              </div>
              
        </div> 
            <div class="p-2  " style="position: absolute; left: 730px; top:400px; height:auto; width:auto">
                                      <?php
                                      if(!empty($error))
                                      {
                                          echo "
                                          <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                              <strong>$error</strong>
                                              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                          </div>

                                          ";
                                      }

                                      ?> 
                </div>
         
      </div>



</div>  
        
    </body>
</html>