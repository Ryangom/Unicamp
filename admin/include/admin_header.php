<?php
ob_start();
session_start();
if (!isset($_SESSION['login'])) {
  header("Location:../portal.php");
}


$user_id= $_SESSION['user_id'];
$active="";

$sql2 = "SELECT * FROM  users where User_id='$user_id'";

$result= mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unicamp | Dashboard </title>
  <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon"/>

  
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

  <style>
      .a{
        width: 40px;
        height: 40px;
        background: aqua;
        border-radius: 50%;
        margin-top: -8px;
        overflow: hidden;
      }
      .a img{
          width: 100%;
          object-fit: cover;
      }
      .table-responsive {
       max-height:300px !important;
      }
      .table-student{
        max-height:500px !important;
      }
      .main-footer{
        background-color: #22262a !important;
      }
      .profile{
        margin-top: 10em !important;
        overflow: hidden;
      }
      .user-avatar img{
        width: 100%;
      }
      .dark-mode input:-webkit-autofill{
        color: black !important;
        -webkit-text-fill-color: black !important;
      }
      .clearfix{
        background: none !important;
      }
  </style>
</head>



<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
          
          <!-- Brand Logo -->
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UniCamp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

<!--  -->
      <!-- SidebarSearch Form -->    
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">

          <img src="../assets/img/Profile_pic/<?php echo $row['Profile_pic']?>" style="width:50px; height: 50px;" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="./profile.php" class="d-block"><?php echo $_SESSION['UserName']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <li class="nav-item ">
                <a href="./profile.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>
                    Profile
                    <i class="right"></i>
                  </p>
                </a> 
              </li>


<?php

      if($_SESSION['user_role']==1){ //For students
        $active='';    
        echo'
          <li class="nav-item ">
                <a href="./std_assignment.php" class="nav-link ' . $active . '">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Assignments
                    <i class="right"></i>
                  </p>
                </a> 
              </li>';

      }
    
      elseif($_SESSION['user_role']==2){ //For Teachers
        $active='';    
        echo'

              <li class="nav-item ">
                <a href="./students.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Students
                    <i class="right"></i>
                  </p>
                </a> 
              </li>


                <li class="nav-item ">
                <a href="./assignment.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Assignments
                    <i class="right"></i>
                  </p>
                </a> 
              </li>';
      }
      else{ //For admin
        $active='';    
        echo'
              <li class="nav-item ">
                <a href="./a.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right"></i>
                  </p>
                </a> 
              </li>

              <li class="nav-item ">
                <a href="./students.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Students
                    <i class="right"></i>
                  </p>
                </a> 
              </li>


              <li class="nav-item ">
                <a href="./teachers.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                    Teachers
                    <i class="right"></i>
                  </p>
                </a> 
              </li>

              <li class="nav-item ">
                <a href="./event.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Events
                    <i class="right"></i>
                  </p>
                </a> 
              </li>

              <li class="nav-item ">
                <a href="./admisstion.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Admisstion
                    <i class="right"></i>
                  </p>
                </a> 
              </li>


                <li class="nav-item ">
                <a href="./courses.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Courses
                    <i class="right"></i>
                  </p>
                </a> 
              </li>

              <li class="nav-item ">
                <a href="./messages.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-comment-alt"></i>
                  <p>
                    Users messages
                    <i class="right"></i>
                  </p>
                </a> 
              </li>

              <li class="nav-item ">
                <a href="./newsletter.php" class="nav-link '.$active.'">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                    Newsletters
                    <i class="right"></i>
                  </p>
                </a> 
              </li>
              
              ';
      }
?>

          <li class="nav-item ">
            <a href="./logout.php" class="nav-link">
              <i class="nav-icon fas fa-ban"></i>
              <p>
                Logout!
                <i class="right"></i>
              </p>
            </a>
            
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
