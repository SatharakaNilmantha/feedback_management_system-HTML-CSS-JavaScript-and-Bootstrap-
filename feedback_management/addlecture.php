<?php
   $servername ="localhost";
   $username ="root";
   $password ="";
   $database ="student_feedback_management_system";

   // create connection
   $connection = new mysqli($servername,$username,$password,$database);

 
   $Lecture_Id ="";
   $User_Name ="";
   $Password ="";
   $First_Name ="";
   $Last_Name ="";
   $Department ="";
   $Course ="";
   $Outlook_Address = "";

   $errorMessage ="";
   $successMessage ="";

   if ($_SERVER['REQUEST_METHOD']=='POST')
   {
        $Lecture_Id =$_POST["id"];
        $User_Name =$_POST["uname"];
        $Password =$_POST["psw"];
        $First_Name =$_POST["fname"];
        $Last_Name =$_POST["lname"];
        $Department =$_POST["dep"];
        $Course =$_POST["course"];
        $Outlook_Address = $_POST["address"];

        do{

            
            // add new lecture to database
       
            $sql="INSERT INTO lecture VALUES('$Lecture_Id','$User_Name','$Password','$First_Name','$Last_Name','$Department','$Course','$Outlook_Address');";

            $result = $connection->query($sql);

            if(!$result)
            {
                $errorMessage="invalied query :".$connection->error;
                break; 
            }
           
            $Lecture_Id ="";
            $User_Name ="";
            $Password ="";
            $First_Name ="";
            $Last_Name ="";
            $Department ="";
            $Course ="";
            $Outlook_Address = "";

            $successMessage ="Lecture added corectly";


        }while(false);

   }
?>

<!DOCTYPE html>
<html >
    <head>
    <title>add lecture</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/addlecture.css">

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
                    <img class="back-image my-3 " src="image/addlecture.jpg" alt="">
                    <h1 class="cont-title container">ADD NEW LECTURE</h1>
                </div>

                <div >
                  <div class=" row   "style="margin-bottom:50px">
                   
                    <div class=" col-7 ms-5 font">
                        <div width="760" height="400"  ><img  style="box-shadow: 5px 10px 18px #888888;  padding-left: 160px; padding-right: 130px; padding-top: 5px; padding-bottom: 5px;" src="icon/logo1.png" alt=""></div>
                        <iframe width="760" height="400" style="box-shadow: 5px 10px 18px #888888; margin-top: 30px;" src="https://www.youtube.com/embed/qLloNbxWoN0?si=ovDWxqaGHJ0xG0hb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      <div class="row">
                          <div class="col-5 ms-2">
                            <div class="row icon-back1 ">
                                <div class="col-3">
                                    <img class="icon1" src="icon/4.jpg" alt=""> 
                                </div>
                                <div class="col-9">
                                    <div style="font-size:20px;margin-left:18px;margin-top:40px;">Phone Number </div>
                                    
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
                        <form  class="form-container" method="post" >
        
                          <h2 style="text-align: center;"><em>Enroll Lecture</em></h2>

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
        
                          <label for="name" class="  py-3"><strong>First Name :</strong></label>
                          <input type="text" class="form-control  "  placeholder="Enter your first name...." name="fname" value="<?php echo $First_Name; ?>" required>

                          <label for="name" class="  py-3"><strong>Last Name :</strong></label>
                          <input type="text" class="form-control  "  placeholder="Enter your Last name...." name="lname" value="<?php echo $Last_Name ; ?>" required>

        
                          <label for="id" class="  py-3"><b>ID : </b></label>
                          <input type="text" class="form-control  " placeholder="Enter id" name="id" value="<?php echo $Lecture_Id; ?>" required>


                         
                          <label for="uname" class="  py-3"><strong>User Name :</strong></label>
                          <input type="text" class="form-control  "  placeholder="Enter your user name...." name="uname" value="<?php echo $User_Name; ?>" required>

                          <label for="address" class="  py-3"><b>Outlook Address :</b></label>
                          <input type="text" class="form-control " placeholder="example@gmail.com"  name="address" value="<?php echo  $Outlook_Address; ?>" required>

                          <label for="psw" class="  py-3"><b>Password :</b></label>
                          <input type="password" class="form-control  " placeholder="Enter Password" name="psw" value="<?php echo  $Password; ?>" required>
        
                         <label for="acadamic" class="  py-3"><b>Department :</b></label>
                           <p >
                            <select class="form-control" name="dep" value="<?php echo $Department; ?>">
                               <option >Computer Department </option>
                               <option >Electrical & Electronic Department </option>
                               <option >Mechanical Department </option>
                               <option >Civil Department </option>   
                            </select>
                           </p>	
                         

                        <label for="course" class="  py-3"><strong>Course :</strong></label>
                        <input type="text" class="form-control  "  placeholder="courses" name="course" value="<?php echo $Course; ?>" required>
                       

        
                          <label for="Remember" class=" py-3"></label>
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
                          <button type="submit" class="btn btn-primary col-3  butt1" id="submit">Submit</button>
                          </div>

                        </form>
                    </div>
                   
               
                 </div>     
               
                   
                </div>   
                          
            </div> 
   </div> 
   

          
    
   </body>

</html>