<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_feedback_management_system";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$User_Name = ""; // New variable to store the username
$Semester = "";
$Course_Code = "";
$Lecture_Name = "";
$Date_Time = "";
$A_1 = "";
$A_2 = "";
$A_3 = "";
$B_1 = "";
$B_2 = "";
$B_3 = "";
$C_1 = "";
$C_2 = "";
$C_3 = "";
$C_4 = "";
$D_1 = "";
$D_2 = "";
$Other_Comment = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the manager
    if (!isset($_GET['id'])) {
        header('location:/feedback_management/viewmylecfeedback.php');
        exit;
    }

    $Id = $_GET["id"];

    // Read all rows from database
    $sql = "SELECT * FROM Lecture_feedback  WHERE id = '$Id';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    // GET method: Show the data of the manager
    if (!$row) {
        header("location:/feedback_management/viewmylecfeedback.php");
        exit;
    }

   $Id = $row["Id"];
   $Semester = $row["Semester"];
   $Course_Code = $row["Course_Code"];
   $Lecture_Name = $row["Lecture_Name"];
   $Date_Time = $row["Date_Time"];
   $A_1 = $row["A_1"];
   $A_2 = $row["A_2"];
   $A_3 = $row["A_3"];
   $B_1 = $row["B_1"];
   $B_2 = $row["B_2"];
   $B_3 = $row["B_3"];
   $C_1 = $row["C_1"];
   $C_2 = $row["C_2"];
   $C_3 = $row["C_3"];
   $C_4 = $row["C_4"];
   $D_1 = $row["D_1"];
   $D_2 = $row["D_2"];
   $Other_Comment = $row["Other_Comment"];  

} 

else 
{
    // POST method: Update the data of the lecture
    if (isset($_POST["id"]))
     {
        $Id = $_POST["id"];
        $Semester = $_POST["Semester"];
        $Course_Code = $_POST["Course_Code"];
        $Lecture_Name = $_POST["Lecture_Name"];
        $Date_Time = $_POST["Date_Time"];
        $A_1 = $_POST["A_1"];
        $A_2 = $_POST["A_2"];
        $A_3 = $_POST["A_3"];
        $B_1 = $_POST["B_1"];
        $B_2 = $_POST["B_2"];
        $B_3 = $_POST["B_3"];
        $C_1 = $_POST["C_1"];
        $C_2 = $_POST["C_2"];
        $C_3 = $_POST["C_3"];
        $C_4 = $_POST["C_4"];
        $D_1 = $_POST["D_1"];
        $D_2 = $_POST["D_2"];
        $Other_Comment = $_POST["Other_Comment"];

        do {
            $sql = "UPDATE  Lecture_feedback SET Semester='$Semester' ,Lecture_Name = '$Lecture_Name', Course_Code = '$Course_Code', A_1= '$A_1', A_2 = '$A_2', A_3 = '$A_3', B_1 = '$B_1', B_2 = '$B_2', B_3 = '$B_3',  C_1 = '$C_1', C_2 = '$C_2', C_3 = '$C_3',  C_4 = '$C_4', D_1 = '$D_1', D_2 = '$D_2', Other_Comment = '$Other_Comment', Date_Time = '$Date_Time' WHERE id = '$Id';";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $successMessage = "Feedback updated correctly";

            header("location:/feedback_management/viewmylecfeedback.php");
            exit;

        } while (true);

      }

      else 
      {
          $errorMessage = "Error: Missing id value in POST request.";
      }
  }

?>


<!DOCTYPE html>
<html >
    <head>
    <title>add lecture feedback</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/addlecfeedback.css">

</head>

   <body class="body">
       
    
            <!-------Nav bar section-->

            <nav class="navbar navbar-expand-sm  navbar-dark container nav" style="background-color:#07075ca7;height: 80px;">
                    <div class="container-fluid">
                        <a href="#" class="navbar-brand ">
                            <img src="icon/logo.jpg" height="70" alt="CoolBrand">
                        </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav row ">
                        <li class="nav-item col-1 ms-2 ">
                            <a class="nav-link font" href="index1.php">HOME</a>
                       
                         
                        <li class="nav-item dropdown col-3  ">
                            <a class="nav-link dropdown-toggle font" href="#" role="button" data-bs-toggle="dropdown"  style="text-align: center;">ADD FEEDBACK</a>
                            <ul class="dropdown-menu" style="background-color: rgba(96, 96, 153, 0.645);">
                            <li><a class="dropdown-item" href="addcoufeedback.php">ADD COURSE FEEDBACK</a></li>
                            <li><a class="dropdown-item" href="addlecfeedbackphp
                            ">ADD LECTURE FEEDBACK</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown col-3  ">
                            <a class="nav-link dropdown-toggle font" href="#" role="button" data-bs-toggle="dropdown">VIEW MY FEEDBACK </a>
                            <ul class="dropdown-menu" style="background-color: rgba(96, 96, 153, 0.645);">
                            <li><a class="dropdown-item" href="viewmycoursefeedback.php">VIEW MY COURSE FEEDBACK</a></li>
                            <li><a class="dropdown-item" href="viewmylecfeedback.php"> VIEW MY LECTURE FEEDBACK</a></li>
                            </ul>
                        </li>

                        <li class="nav-item col-3 ms-3 " >
                          <a class="nav-link font" href="changepsw1.php" style="text-align: center;">CHANGE PASSWORD</a>
                        </li> 

                        </li>
                        <li class="nav-item col-1 ">
                            <a class="nav-link font" href="home.php">LOGOUT</a>
                        </li>
                        
                        </ul>
                    
                    </div>
                    </div>
                    <form class="d-flex col-3">
                        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-outline-dark me-3">Search</button> 
                    </form>
                
            </nav>


  <div class="container border" style="background-color: rgba(123, 115, 231, 0.06);padding-bottom: 20px;">    

            <!-------feedback section-->

             <h1 style="text-align: center; font-size: 50px; color: #8a8abff8; padding-top: 50px;">LECTURE EVALUATION</h1>
             <p class="font" style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam quo voluptatum perspiciatis placeat, excepturi eos sapiente, magni cumque dolores autem earum quis sint, inventore quia iure recusandae quibusdam eveniet. Aspernatur!
             Esse nobis iste unde, nemo excepturi voluptatibus laborum ut dolorum dicta, non ipsam quidem aspernatur eveniet quibusdam, nisi iure consectetur libero placeat quas eaque! Harum sint porro corrupti tempore a?</p>
             <form  class="form-container"  method="post"> 

                       <?php
                             if(!empty($errorMessage))
                             {
                                echo "
                                <div class ='alert alert-warning alert-dismissible fade show' role ='alert'>
                                   <strong>$errorMessage</strong>
                                   <button type ='button'class ='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                                </div>
                                ";
                             }

                     ?>

             <input type="hidden" name="id" value="<?php echo $Id; ?>">

              <div class="row font my-5" >
                 <div class=" col-6">
                     <div><b>Semester :</b>
                       <select class="form-control " name="Semester"  value="<?php echo $Semester; ?>" required>
                          <option>1st semester </option>
                          <option>2nd semester </option>
                          <option>3rd semester </option>
                          <option>4th semester </option>
                          <option>5th semester </option>
                          <option>6th semester </option>
                          <option>7th semester </option>
                          <option>8th semester </option>
                       </select>
                     </div>
                 </div>
                 
                 <div class="col-6">
                    <div><b>Course Unite:</b>
                        <select class="form-control " name="Course_Code"  value="<?php echo $Course_Code; ?>" required>
                              <?php
                                        // read all rows from database
                                      $sql1 = "SELECT Course_Name,Course_Code FROM course  ORDER BY Course_Name ASC";
                                      $result1 = $connection->query($sql1);

                                      if(!$result1)
                                      {
                                      die("invalied query :".$connection->error);
                                      }


                                      // read data of each row
                                      while($row = $result1->fetch_assoc())
                                      {
                                      echo "
                                      
                                        <option>$row[Course_Code]-$row[Course_Name]</option>

                                      ";

                                      }
                                    ?>
                          </select>    
                        </div>
                 </div>
 
             </div>
 
             <div class="row my-4 font" >
                     <div class=" col-6">
                     <div><b>Name of the Lecture :</b>
                      <select class="form-control " name="Lecture_Name"  value="<?php echo $Lecture_Name; ?>" required>
                            <?php
                              // read all rows from database
                            $sql1 = "SELECT First_Name,Last_Name FROM lecture ORDER BY First_Name ASC";
                            $result1 = $connection->query($sql1);

                            if(!$result1)
                            {
                            die("invalied query :".$connection->error);
                            }


                            // read data of each row
                            while($row = $result1->fetch_assoc())
                            {
                            echo "
                            
                              <option>$row[First_Name] $row[Last_Name]</option>

                            ";

                            }
                          ?>
                        </select>
                     </div>
                    </div> 
                     <div class="col-6">
                         <div><b>Date/Time :</b> <input class="form-control" type="datetime-local" name="Date_Time" value="<?php echo $Date_Time; ?>" required  ></div>
                     </div>
             </div>
            
                 
             <p class="font my-5" style="text-align: center;"><em><b>Please respond to the following statements by marking on the scale next to each statements.
             The scale 1 to 5 refers to the following</b></em></p>
 
             <div class="row " style="text-align: center;font-size:18px;font-weight: bold;">
                 <div class="col " style="color: rgb(194, 28, 16);">-2=Strongly Disagree</div>
                 <div class="col" style="color: rgb(237, 151, 39);">-1=Disagree</div>
                 <div class="col" style="color: rgb(237, 217, 39);">0=Not Sure</div>
                 <div class="col" style="color: rgb(105, 237, 39);">+1=Agree</div>
                 <div class="col" style="color: rgb(2, 109, 20); " >+2=Strongly Agree</div>
 
             </div>
         
 
             <div class="font " style="font-size:20px;font-weight: bold;margin-top: 60px;">A.Time Management</div>
             <div class="container con">
                 <div class="row" >
                   <div class="col-12">
                     <table class="table table-bordered">
                       <thead >
                         <tr>
                           <th scope="col-1">NO:</th>
                           <th scope="col-6">Question</th>
                           <th scope="col-1" style="color: rgb(194, 28, 16);">-2=Strongly Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 151, 39);">-1=Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 217, 39);">0=Not Sure</th>
                           <th scope="col-1" style="color: rgb(105, 237, 39);">1=Agree</th>
                           <th scope="col-1" style="color: rgb(2, 109, 20);">+2=Strongly Agree</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>i</td>
                           <td>Lectures/Labs/Fieldwork started and finished on time</td>
                           <td><input type="radio" name="A_1" value="-2" class="container"   <?php if ($A_1 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_1" value="-1" class="container"   <?php if ($A_1 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_1" value="0" class="container"    <?php if ($A_1 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_1" value="1" class="container"    <?php if ($A_1 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_1" value="2" class="container"    <?php if ($A_1 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>The lecture manageed class time effective</td>
                             <td><input type="radio" name="A_2" value="-2" class="container"   <?php if ($A_2 == '-2') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="A_2" value="-1" class="container"   <?php if ($A_2 == '-1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="A_2" value="0" class="container"    <?php if ($A_2 == '0') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="A_2" value="1" class="container"    <?php if ($A_2 == '1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="A_2" value="2" class="container"    <?php if ($A_2 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                           <td>iii</td>
                           <td>The lectur was readily available for consultation with students</td>
                           <td><input type="radio" name="A_3" value="-2" class="container"   <?php if ($A_3 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_3" value="-1" class="container"   <?php if ($A_3 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_3" value="0" class="container"    <?php if ($A_3 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_3" value="1" class="container"    <?php if ($A_3 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="A_3" value="2" class="container"    <?php if ($A_3 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                       </tbody>
                     </table>
                   </div>
                 </div>
             </div>    
                
             <div class="font " style="font-size:20px;font-weight: bold;margin-top: 30px;">B.Delivery Method</div>
             <div class="container con">
                 <div class="row" >
                   <div class="col-12">
                     <table class="table table-bordered">
                       <thead >
                         <tr>
                           <th scope="col-1">NO:</th>
                           <th scope="col-6">Question</th>
                           <th scope="col-1" style="color: rgb(194, 28, 16);">-2=Strongly Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 151, 39);">-1=Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 217, 39);">0=Not Sure</th>
                           <th scope="col-1" style="color: rgb(105, 237, 39);">1=Agree</th>
                           <th scope="col-1" style="color: rgb(2, 109, 20);">+2=Strongly Agree</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>i</td>
                           <td>Use of teaching aids (multimeadia,white board)</td>
                           <td><input type="radio" name="B_1" value="-2" class="container"   <?php if ($B_1 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_1" value="-1" class="container"   <?php if ($B_1 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_1" value="0" class="container"    <?php if ($B_1 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_1" value="1" class="container"    <?php if ($B_1 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_1" value="2" class="container"    <?php if ($B_1 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>Lectures were easy to understand</td>
                             <td><input type="radio" name="B_2" value="-2" class="container"   <?php if ($B_2 == '-2') echo 'checked'; ?> required></td>
                            <td><input type="radio" name="B_2" value="-1" class="container"   <?php if ($B_2 == '-1') echo 'checked'; ?> required></td>
                            <td><input type="radio" name="B_2" value="0" class="container"    <?php if ($B_2 == '0') echo 'checked'; ?> required></td>
                            <td><input type="radio" name="B_2" value="1" class="container"    <?php if ($B_2 == '1') echo 'checked'; ?> required></td>
                            <td><input type="radio" name="B_2" value="2" class="container"    <?php if ($B_2 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                           <td>iii</td>
                           <td>The lecture encouraged students to participate in discussions</td>
                           <td><input type="radio" name="B_3" value="-2" class="container"   <?php if ($B_3 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_3" value="-1" class="container"   <?php if ($B_3 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_3" value="0" class="container"    <?php if ($B_3 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_3" value="1" class="container"    <?php if ($B_3 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="B_3" value="2" class="container"    <?php if ($B_3 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                       </tbody>
                     </table>
                   </div>
                 </div>
             </div> 
 
             <div class="font " style="font-size:20px;font-weight: bold;margin-top: 30px;">C.Subject Command</div>
             <div class="container con">
                 <div class="row" >
                   <div class="col-12">
                     <table class="table table-bordered">
                       <thead >
                         <tr>
                           <th scope="col-1">NO:</th>
                           <th scope="col-6">Question</th>
                           <th scope="col-1" style="color: rgb(194, 28, 16);">-2=Strongly Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 151, 39);">-1=Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 217, 39);">0=Not Sure</th>
                           <th scope="col-1" style="color: rgb(105, 237, 39);">1=Agree</th>
                           <th scope="col-1" style="color: rgb(2, 109, 20);">+2=Strongly Agree</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>i</td>
                           <td>The lecture focused on syllabus</td>
                           <td><input type="radio" name="C_1" value="-2" class="container"   <?php if ($C_1 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_1" value="-1" class="container"   <?php if ($C_1 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_1" value="0" class="container"    <?php if ($C_1 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_1" value="1" class="container"    <?php if ($C_1 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_1" value="2" class="container"    <?php if ($C_1 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>The lecture was self-confident in subject and teaching</td>
                             <td><input type="radio" name="C_2" value="-2" class="container"   <?php if ($C_2 == '-2') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_2" value="-1" class="container"   <?php if ($C_2 == '-1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_2" value="0" class="container"    <?php if ($C_2 == '0') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_2" value="1" class="container"    <?php if ($C_2 == '1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_2" value="2" class="container"    <?php if ($C_2 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                           <td>iii</td>
                           <td>The lecture linked real-world applications and creating insert in to the subject</td>
                           <td><input type="radio" name="C_3" value="-2" class="container"   <?php if ($C_3 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_3" value="-1" class="container"   <?php if ($C_3 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_3" value="0" class="container"    <?php if ($C_3 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_3" value="1" class="container"    <?php if ($C_3 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="C_3" value="2" class="container"    <?php if ($C_3 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                             <td>iv</td>
                             <td>The lecture updated latest development in the field</td>
                             <td><input type="radio" name="C_4" value="-2" class="container"   <?php if ($C_4 == '-2') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_4" value="-1" class="container"   <?php if ($C_4 == '-1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_4" value="0" class="container"    <?php if ($C_4 == '0') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="C_4" value="1" class="container"    <?php if ($C_4 == '1') echo 'checked'; ?> required></td>
                            <td><input type="radio" name="C_4" value="2" class="container"    <?php if ($C_4 == '2') echo 'checked'; ?> required></td>
 
                       </tbody>
                     </table>
                   </div>
                 </div>
             </div>
 
             <div class="font " style="font-size:20px;font-weight: bold;margin-top: 30px;">D.About Myself</div>
             <div class="container con">
                 <div class="row" >
                   <div class="col-12">
                     <table class="table table-bordered">
                       <thead >
                         <tr>
                           <th scope="col-1">NO:</th>
                           <th scope="col-6">Question</th>
                           <th scope="col-1" style="color: rgb(194, 28, 16);">-2=Strongly Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 151, 39);">-1=Disagree</th>
                           <th scope="col-1" style="color: rgb(237, 217, 39);">0=Not Sure</th>
                           <th scope="col-1" style="color: rgb(105, 237, 39);">1=Agree</th>
                           <th scope="col-1" style="color: rgb(2, 109, 20);">+2=Strongly Agree</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>i</td>
                           <td>I asked questions from the Lecture in the class</td>
                           <td><input type="radio" name="D_1" value="-2" class="container"   <?php if ($D_1 == '-2') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="D_1" value="-1" class="container"   <?php if ($D_1 == '-1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="D_1" value="0" class="container"    <?php if ($D_1 == '0') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="D_1" value="1" class="container"    <?php if ($D_1 == '1') echo 'checked'; ?> required></td>
                           <td><input type="radio" name="D_1" value="2" class="container"    <?php if ($D_1 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>I consulted with the lecture after lecture hourse</td>
                             <td><input type="radio" name="D_2" value="-2" class="container"   <?php if ($D_2 == '-2') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="D_2" value="-1" class="container"   <?php if ($D_2 == '-1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="D_2" value="0" class="container"    <?php if ($D_2 == '0') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="D_2" value="1" class="container"    <?php if ($D_2 == '1') echo 'checked'; ?> required></td>
                             <td><input type="radio" name="D_2" value="2" class="container"    <?php if ($D_2 == '2') echo 'checked'; ?> required></td>
                         </tr>
 
                       </tbody>
                     </table>
                   </div>
                 </div>
             </div>
         
             <div class=" font" style="font-size:20px;font-weight: bold;margin-top: 30px;"><b>Any other comment: </b><textarea class="form-control" type="text" placeholder="Type your comment..." rows="3" style="height: 100px;" name="Other_Comment" ><?php echo $Other_Comment; ?></textarea></div>
 
             <div  class=" py-5 font"><input type="checkbox" name="remember" ><strong><em>Remember me</em></strong></div>

                       <?php
                             if(!empty($successMessage))
                             {
                                echo "
                                <div class ='alert alert-warning alert-dismissible fade show' role ='alert'>
                                   <strong>$successMessage</strong>
                                   <button type ='button'class ='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                                </div>
                                ";
                             }
                     ?> 
             
             <button type="submit" class="btn btn-primary col-3  butt1 " id="submit" >Submit</button>
        
         </form>

   </div> 
   

          
    
   </body>

</html>