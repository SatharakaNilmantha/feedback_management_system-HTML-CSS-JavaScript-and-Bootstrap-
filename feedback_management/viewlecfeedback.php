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
        header('location:/feedback_management/lecfeedback.php');
        exit;
    }

    $Id = $_GET["id"];

    // Read all rows from database
    $sql = "SELECT * FROM Lecture_feedback  WHERE id = '$Id';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    // GET method: Show the data of the manager
    if (!$row) {
        header("location:/feedback_management/lecfeedback.php");
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


?>


<!DOCTYPE html>
<html >
    <head>
    <title>add lecture feedback</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

      <style>
              table {
                  width: 100%;
                  border-collapse: collapse;
              }

              .td1 {
                  text-align: center;
                  vertical-align: middle;
              }

              input[type="radio"] {
                  display: none;
              }

              .icon {
                  display: inline-block;
                  font-size: 12px;
                  cursor: pointer;
                  font-weight: 1000;
              }

              input[type="radio"]:checked + .icon::after {
                  content: '✔';
                  color: green;
              }

              .icon::after {
                  content: '✖';
                  color: red;
              }

      </style>  

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
                            <a class="nav-link font" href="index.php">HOME</a>
                       
                         
                        <li class="nav-item dropdown col-3  ">
                            <a class="nav-link dropdown-toggle font" href="#" role="button" data-bs-toggle="dropdown"  style="text-align: center;">USER MANAGEMENT</a>
                            <ul class="dropdown-menu" style="background-color: rgba(96, 96, 153, 0.645);">
                            <li><a class="dropdown-item" href="addstudent.php">ADD NEW STUDENT</a></li>
                            <li><a class="dropdown-item" href="addcourse.php">ADD NEW COURSE</a></li>
                            <li><a class="dropdown-item" href="addlecture.php">ADD NEW LECTURE</a></li>
                            <li><a class="dropdown-item" href="addmanager.php">ADD NEW MANAGEMENT ASSISTANT</a></li>

                            <li><a class="dropdown-item" href="sreport.php">STUDENT REPORT</a></li>
                            <li><a class="dropdown-item" href="creport.php">COURSE REPORT</a></li>
                            <li><a class="dropdown-item" href="lecreport.php">LECTURE REPORT</a></li>
                            <li><a class="dropdown-item" href="mreport.php">MANAGEMENT ASSISTANT REPORT</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown col-3  ">
                            <a class="nav-link dropdown-toggle font" href="#" role="button" data-bs-toggle="dropdown">FEEDBACK MANAGEMENT </a>
                            <ul class="dropdown-menu" style="background-color: rgba(96, 96, 153, 0.645);">
                            <li><a class="dropdown-item" href="coursefeedback.php">COURSE FEEDBACK</a></li>
                            <li><a class="dropdown-item" href="lecfeedback.php">LECTURE FEEDBACK</a></li>
                            </ul>
                        </li>

                        <li class="nav-item col-3 ms-3 " >
                          <a class="nav-link font" href="changepsw.php" style="text-align: center;">CHANGE PASSWORD</a>
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
             
              <div class="row font my-5" >
                 <div class=" col-6">
                     <div><b>Semester :</b>
                       <?php echo $Semester; ?>
                     </div>
                 </div>
                 
                 <div class="col-6">
                     <div><b>Course Unite : </b><?php echo $Course_Code; ?></div>
                 </div>
 
             </div>
 
             <div class="row my-4 font" >
                     <div class=" col-6">
                         <div><b>Name of the Lecture :</b><?php echo $Lecture_Name; ?></div>
                     </div>
                     
                     <div class="col-6">
                         <div><b>Date/Time :</b><?php echo $Date_Time; ?></div>
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
                              <td class="td1">
                                  <input type="radio" name="A_1" value="-2" class="container" <?php if ($A_1 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_1" value="-1" class="container" <?php if ($A_1 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_1" value="0" class="container" <?php if ($A_1 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_1" value="1" class="container" <?php if ($A_1 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_1" value="2" class="container" <?php if ($A_1 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>The lecture manageed class time effective</td>
                                <td class="td1">
                                    <input type="radio" name="A_2" value="-2" class="container" <?php if ($A_2 == '-2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="A_2" value="-1" class="container" <?php if ($A_2 == '-1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="A_2" value="0" class="container" <?php if ($A_2 == '0') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="A_2" value="1" class="container" <?php if ($A_2 == '1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="A_2" value="2" class="container" <?php if ($A_2 == '2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                         </tr>
 
                         <tr>
                           <td>iii</td>
                           <td>The lectur was readily available for consultation with students</td>
                              <td class="td1">
                                  <input type="radio" name="A_3" value="-2" class="container" <?php if ($A_3 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_3" value="-1" class="container" <?php if ($A_3 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_3" value="0" class="container" <?php if ($A_3 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_3" value="1" class="container" <?php if ($A_3 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="A_3" value="2" class="container" <?php if ($A_3 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
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
                             <td class="td1">
                                  <input type="radio" name="B_1" value="-2" class="container" <?php if ($B_1 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="B_1" value="-1" class="container" <?php if ($B_1 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="B_1" value="0" class="container" <?php if ($B_1 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="B_1" value="1" class="container" <?php if ($B_1 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="B_1" value="2" class="container" <?php if ($B_1 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>Lectures were easy to understand</td>
                              <td class="td1">
                                    <input type="radio" name="B_2" value="-2" class="container" <?php if ($B_2 == '-2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_2" value="-1" class="container" <?php if ($B_2 == '-1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_2" value="0" class="container" <?php if ($B_2 == '0') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_2" value="1" class="container" <?php if ($B_2 == '1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_2" value="2" class="container" <?php if ($B_2 == '2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                         </tr>
 
                         <tr>
                           <td>iii</td>
                           <td>The lecture encouraged students to participate in discussions</td>
                            <td class="td1">
                                    <input type="radio" name="B_3" value="-2" class="container" <?php if ($B_3 == '-2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_3" value="-1" class="container" <?php if ($B_3 == '-1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_3" value="0" class="container" <?php if ($B_3 == '0') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_3" value="1" class="container" <?php if ($B_3 == '1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="B_3" value="2" class="container" <?php if ($B_3 == '2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
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
                             <td class="td1">
                                  <input type="radio" name="C_1" value="-2" class="container" <?php if ($C_1 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_1" value="-1" class="container" <?php if ($C_1 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_1" value="0" class="container" <?php if ($C_1 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_1" value="1" class="container" <?php if ($C_1 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_1" value="2" class="container" <?php if ($C_1 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>The lecture was self-confident in subject and teaching</td>
                             <td class="td1">
                                  <input type="radio" name="C_2" value="-2" class="container" <?php if ($C_2 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_2" value="-1" class="container" <?php if ($C_2 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_2" value="0" class="container" <?php if ($C_2 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_2" value="1" class="container" <?php if ($C_2 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_2" value="2" class="container" <?php if ($C_2 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                         </tr>
 
                         <tr>
                           <td>iii</td>
                           <td>The lecture linked real-world applications and creating insert in to the subject</td>
                             <td class="td1">
                                  <input type="radio" name="C_3" value="-2" class="container" <?php if ($C_3 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_3" value="-1" class="container" <?php if ($C_3 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_3" value="0" class="container" <?php if ($C_3 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_3" value="1" class="container" <?php if ($C_3 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="C_3" value="2" class="container" <?php if ($C_3 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                         </tr>
 
                         <tr>
                             <td>iv</td>
                             <td>The lecture updated latest development in the field</td>
                                <td class="td1">
                                    <input type="radio" name="C_3" value="-2" class="container" <?php if ($C_3 == '-2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="C_3" value="-1" class="container" <?php if ($C_3 == '-1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="C_3" value="0" class="container" <?php if ($C_3 == '0') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="C_3" value="1" class="container" <?php if ($C_3 == '1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="C_3" value="2" class="container" <?php if ($C_3 == '2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
 
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
                             <td class="td1">
                                  <input type="radio" name="D_1" value="-2" class="container" <?php if ($D_1 == '-2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="D_1" value="-1" class="container" <?php if ($D_1 == '-1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="D_1" value="0" class="container" <?php if ($D_1 == '0') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="D_1" value="1" class="container" <?php if ($D_1 == '1') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                              <td class="td1">
                                  <input type="radio" name="D_1" value="2" class="container" <?php if ($D_1 == '2') echo 'checked'; ?> required>
                                  <span class="icon"></span>
                              </td>
                         </tr>
 
                         <tr>
                             <td>ii</td>
                             <td>I consulted with the lecture after lecture hourse</td>
                              <td class="td1">
                                    <input type="radio" name="D_2" value="-2" class="container" <?php if ($D_2 == '-2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="D_2" value="-1" class="container" <?php if ($D_2 == '-1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="D_2" value="0" class="container" <?php if ($D_2 == '0') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="D_2" value="1" class="container" <?php if ($D_2 == '1') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                                <td class="td1">
                                    <input type="radio" name="D_2" value="2" class="container" <?php if ($D_2 == '2') echo 'checked'; ?> required>
                                    <span class="icon"></span>
                                </td>
                         </tr>
 
                       </tbody>
                     </table>
                   </div>
                 </div>
             </div>
         
             <div class=" font" style="font-size:20px;font-weight: bold;margin-top: 30px;"><b>Any other comment: </b><textarea class="form-control" type="text" placeholder="Type your comment..." rows="3" style="height: 100px;" name="Other_Comment" required><?php echo $Other_Comment; ?></textarea></div>

             
             <div class=" container" style="margin-top: 30px; width:100px !important;"><a href="lecfeedback.php" class="btn btn-primary " role="button">OK</a></div>
        
         </form>

   </div> 
   

      <script type="text/javascript" src="js/viewlecfeedback.js"></script>
    
   </body>

</html>