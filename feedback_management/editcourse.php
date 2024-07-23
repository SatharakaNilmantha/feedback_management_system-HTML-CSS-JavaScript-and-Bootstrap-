<?php

    $servername ="localhost";
    $username ="root";
    $password ="";
    $database ="student_feedback_management_system";

    // create connection
    $connection = new mysqli($servername,$username,$password,$database);

    $id ="";
    $cname ="";
    $ccode ="";
    $department ="";
    $sem ="";
    $credit="";


    $errorMessage ="";
    $successMessage ="";

    if ($_SERVER['REQUEST_METHOD']=='GET')
    {
      // GET method: Show the data of the manager
      if (!isset($_GET['id']))
      {
        header('location:/feedback_management/creport.php'); 
        exit;
      }

      $id =$_GET["id"];

      // read all rows from database
      $sql = "SELECT * FROM course WHERE Course_Id= '$id'  ";
      $result = $connection->query($sql);
     
      $row = $result->fetch_assoc();
      
      

    
      // GET method: Show the data of the manager
       if (!$row)
       {
         header("location:/feedback_management/creport.php");
         exit;
       }

        $id =$row["Course_Id"];
        $cname =$row["Course_Name"];
        $ccode =$row["Course_Code"];
        $department =$row["Department"];
        $sem =$row["Semester"];
        $credit=$row["Credits"];

    } 

    else
    {
      // POST method: Update the data of the manager
      $id =$_POST["courseid"];
      $cname =$_POST["coursename"];
      $ccode =$_POST["ccode"];
      $department =$_POST["dep"];
      $sem =$_POST["sem"];
      $credit=$_POST["credit"];

      do{

        $sql ="UPDATE course SET  Course_Name='$cname',Course_Code='$ccode',Department= '$department',Semester='$sem' ,Credits='$credit' WHERE Course_Id='$id';";

        $result = $connection->query($sql);

        if(!$result)
            {
                $errorMessage="invalied query :".$connection->error;
                break; 
            }

        $successMessage ="Manager added corectly";  

        header("location:/feedback_management/creport.php");
        exit; 

      }while(true);

    }
?>

<!DOCTYPE html>
<html >
    <head>
    <title>add course</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/addcourse.css">

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


    <div class="container border" style="background-color: rgba(123, 115, 231, 0.095);padding-bottom: 20px;">    

        
           
            <!-------form section-->  
           <div>
        
                <div >
                    <img class="back-image my-3 " src="image/log.jpg" alt="">
                    <h1 class="cont-title container">UPDATE THE COURSE</h1>
                </div>

                <div >
                  <div class=" row   "style="margin-bottom:50px">
                   
                    <div class=" col-7 ms-5 font">
                        <iframe width="760" height="470" style="box-shadow: 5px 10px 18px #888888; margin-top: 70px;" src="https://www.youtube.com/embed/qLloNbxWoN0?si=ovDWxqaGHJ0xG0hb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      <div class="row">
                          <div class="col-5 ms-2">
                            <div class="row icon-back1 ">
                                <div class="col-3">
                                    <img class="icon1" src="icon/4.jpg" alt=""> 
                                </div>
                                <div class="col-9">
                                    <div style="font-size:20px;margin-left:18px;margin-top:40px;">Phone Numbe </div>
                                    
                                    <p style="font-size:30px;margin-left:18px;"><a href="#" class="nav-item nav-link active ">012-3456789</a></p>
                                </div>
                            </div> 
                          </div>
                          <div class="col-6 ">
                            <div class="row icon-back2">
                                <div class="col-3">
                                    <img class="icon1" src="icon/2.png" alt=""> 
                                </div>
                                <div class="col-9">
                                    <div style="font-size:20px;margin-top:40px;text-align: left;">Campus Email </div>
                                    <p style="text-align:left;font-size: 25px;"><a href="#" class="nav-item nav-link active ">informsunglow@gmail.com</a></p>
                                </div>
                            </div> 
                          </div>
                      </div>
                      
                    </div>
        

                    <div class=" form-style container border col-4  py-3 font" id="myForm" style="box-shadow: 5px 10px 18px #888888; ">
                        <form  class="form-container" method="post">
        
                          <h2 style="text-align: center;"><em>ADD COURSE</em></h2>

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
        
                          <label for="name" class="  py-3"><strong>Course ID :</strong></label>
                          <input type="text" class="form-control  "  placeholder="Enter The Course ID" name="courseid" value="<?php echo $id; ?>" required>


                          <label for="coursename" class="  py-3"><b>Course Name :</b></label>
                          <input type="text" class="form-control " placeholder="Enter the course name" name="coursename" value="<?php echo $cname; ?>" required>
        
                     
                          <label for="ccode" class="  py-3"><b>Course Code :</b></label>
                          <input type="text" class="form-control  " placeholder="Enter the course code" name="ccode" value="<?php echo $ccode; ?>" required>

                          <label for="acadamic" class="  py-3"><b>Semester :</b></label>
                          <p >
                            <select class="form-control" name="sem" value="<?php echo $sem; ?>">
                               <option>1st semester </option>
                               <option>2nd semester </option>
                               <option>3rd semester </option>
                               <option>4th semester </option>
                               <option>5th semester </option>
                               <option>6th semester </option>
                               <option>7th semester </option>
                               <option>8th semester </option>
                            </select>
                           </p>
                          
                           <label for="acadamic" class="  py-3"><b>Department :</b></label>
                           <p >
                            <select class="form-control" value="<?php echo $department; ?>" name="dep">
                               <option>Computer Department </option>
                               <option>Electrical & Electronic Department </option>
                               <option>Mechanical Department </option>
                               <option>Civil Department </option>   
                            </select>
                           </p>

                         
                          <label for="uname" class="  py-3"><strong>Credits :</strong></label>
                          <p >
                            <select class="form-control" name="credit" value="<?php echo $credit; ?>">
                               <option>credit 02 </option>
                               <option>credit 03 </option>
                               <option>credit 04 </option>
                            </select>
                           </p>
                        
        
                          <label for="Remember" class=" py-4"></label>
                          <input type="checkbox" name="remember" id="che" required><strong><em>Remember me</em></strong>
        
                          

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

                         <div class="py-4" >
                          <button type="submit" class="btn btn-primary col-3  butt1" id="submit">Update</button>
                          </div>
                        </form>
                    </div>
                   
               
                 </div>     
               
                   
                </div>   
                          
            </div> 
   </div> 
   

          
    
   </body>

</html>