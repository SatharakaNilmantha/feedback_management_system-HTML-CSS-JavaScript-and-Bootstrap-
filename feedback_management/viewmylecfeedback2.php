<?php
session_start();

// Assuming the user is logged in and the username is stored in the session
if (!isset($_SESSION['User_Name'])) 
{
    die("User not logged in.");
}

$logged_in_user = $_SESSION['User_Name'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_feedback_management_system";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) 
{
    die("Connection error: " . $connection->connect_error);
}

// Default query to display all feedbacks for the logged-in user
    $sql = "SELECT 
                lf.Id, 
                lf.Semester, 
                lf.Course_Code, 
                lf.Date_Time 
            FROM 
                lecture_register lr
            INNER JOIN 
                lecture l ON lr.User_Name = l.User_Name
            INNER JOIN 
                lecture_feedback lf ON lr.First_Name = SUBSTRING_INDEX(lf.Lecture_Name, ' ', 1) 
                    AND lr.Last_Name = SUBSTRING_INDEX(lf.Lecture_Name, ' ', -1)
            WHERE 
                lr.User_Name = ?
            ORDER BY 
                lf.Semester ASC, lf.Course_Code ASC";
    $params = [$logged_in_user];

// Update the query if the search form is  submitted    
if (isset($_POST['submit']) && !empty($_POST['search']))
{
    $search = $_POST['search'];
    // Protect against SQL injection
    $search = "%" . $connection->real_escape_string($search) . "%";

    // Query to search for feedbacks by semester, course name, or course code for the logged-in user
    $sql = "SELECT 
            lf.Id, 
            lf.Semester, 
            lf.Course_Code, 
            lf.Date_Time 
            FROM 
            lecture_register lr
            INNER JOIN 
            lecture l ON lr.User_Name = l.User_Name
            INNER JOIN 
            lecture_feedback lf ON lr.First_Name = SUBSTRING_INDEX(lf.Lecture_Name, ' ', 1) 
                AND lr.Last_Name = SUBSTRING_INDEX(lf.Lecture_Name, ' ', -1)
            WHERE 
            lr.User_Name = ? AND (lf.Semester LIKE ? OR lf.Course_Code LIKE ?)
            ORDER BY 
            lf.Semester ASC, lf.Course_Code ASC";

    $params = [$logged_in_user, $search, $search];
    
    // Store the search query in the session to persist it across the redirect
    $_SESSION['search_query'] = $sql;
    $_SESSION['search_params'] = $params;
    
    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}


// Update the query if the search form is when empty input submitted    
if (isset($_POST['submit']) && empty($_POST['search']))
{
    $search = $_POST['search'];
    // Protect against SQL injection
    $search = "%" . $connection->real_escape_string($search) . "%";

    // Query to search for feedbacks  for the logged-in user
    $sql = "SELECT 
                lf.Id, 
                lf.Semester, 
                lf.Course_Code, 
                lf.Date_Time 
            FROM 
                lecture_register lr
            INNER JOIN 
                lecture l ON lr.User_Name = l.User_Name
            INNER JOIN 
                lecture_feedback lf ON lr.First_Name = SUBSTRING_INDEX(lf.Lecture_Name, ' ', 1) 
                    AND lr.Last_Name = SUBSTRING_INDEX(lf.Lecture_Name, ' ', -1)
            WHERE 
                lr.User_Name = ?
            ORDER BY 
                lf.Semester ASC, lf.Course_Code ASC";
    $params = [$logged_in_user];
    
    // Store the search query in the session to persist it across the redirect
    $_SESSION['search_query'] = $sql;
    $_SESSION['search_params'] = $params;
    
    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

// Check if there's a search query stored in the session
if (isset($_SESSION['search_query']) && isset($_SESSION['search_params'])) 
{
    $sql = $_SESSION['search_query'];
    $params = $_SESSION['search_params'];
    // Clear the session variables
    unset($_SESSION['search_query']);
    unset($_SESSION['search_params']);
}

$stmt = $connection->prepare($sql);
$stmt->bind_param(str_repeat("s", count($params)), ...$params);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) 
{
    die("Invalid query: " . $connection->error);
}
?>



<!DOCTYPE html>
<html >
    <head>
    <title>view My lecture feedback</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/viewcoursefeedback.css">


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
                      <a class="nav-link font" href="index2.php">HOME</a>
                 

                  <li class="nav-item dropdown col-3 ms-5 ">
                      <a class="nav-link dropdown-toggle font" href="#" role="button" data-bs-toggle="dropdown">VIEW MY FEEDBACK </a>
                      <ul class="dropdown-menu" style="background-color: rgba(96, 96, 153, 0.645);">
                      <li><a class="dropdown-item" href="viewmycoursefeedback2.php">VIEW MY COURSE FEEDBACKS</a></li>
                      <li><a class="dropdown-item" href="viewmylecfeedback2.php"> VIEW MY LECTURE FEEDBACKS</a></li>
                      </ul>
                  </li>

                  <li class="nav-item col-4 ms-5 " >
                    <a class="nav-link font" href="changepsw2.php" style="text-align: center;">CHANGE PASSWORD</a>
                  </li> 

                  </li>
                  <li class="nav-item col-1 ">
                      <a class="nav-link font" href="home.php">LOGOUT</a>
                  </li>
                  
                  </ul>
              
              </div>
              </div>
              
              <form class="d-flex col-3" method="post" action="">
                <input class="form-control me-2" type="search" placeholder="Search by Semeser / Course" name="search" aria-label="Search">
                <button type="submit" class="btn btn-outline-dark me-3" name="submit">Search</button>
             </form>
          
      </nav>


  <div class="container border" style="background-color: rgba(123, 115, 231, 0.06);padding-bottom: 20px;">    

            <!-------feedback section-->

             <h1 style="text-align: center; font-size: 50px; color: #8a9abf; padding-top: 50px;"> VIEW MY LECTURE EVALUATION</h1>
             <p class="font" style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam quo voluptatum perspiciatis placeat, excepturi eos sapiente, magni cumque dolores autem earum quis sint, inventore quia iure recusandae quibusdam eveniet. Aspernatur!
             Esse nobis iste unde, nemo excepturi voluptatibus laborum ut dolorum dicta, non ipsam quidem aspernatur eveniet quibusdam, nisi iure consectetur libero placeat quas eaque! Harum sint porro corrupti tempore a?</p>
          
            <div class="container con">
                <div class="row" >
                  <div class="col-12">
                    <table class="table table-bordered">
                      <thead >
                        <tr>
                          <th scope="col">Semester</th>
                          <th scope="col">Course Unite & Course Name </th>
                          <th scope="col">Date/Time</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                        <tbody>
                         <?php

                            // Fetch and display the results
                            if ($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc()) 
                                {
                                    $row['Id'];
                                    echo "
                                    <tr>
                                        <td>{$row['Semester']}</td>
                                        <td>{$row['Course_Code']}</td>
                                        <td>{$row['Date_Time']}</td>
                                        <td>
                                           <a class='btn btn-primary'  href='viewlecfeedback2.php?id={$row['Id']}'>View</a> 
                                        </td>
                                    </tr>
                                    ";
                                } 


                            }

                            else
                             {
                                echo "<tr><td colspan='5' class='text-danger text-center'>No results found.</td></tr>";
                             }

                            ?>
                       </tbody>
                    </table>
                  </div>
                </div>
            </div>
       
        </form>

   </div> 
   
   </body>

</html>

<?php
   $stmt->close();
   $connection->close();
?>