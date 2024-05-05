<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <title> Nav| Code7</title>
  <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon"/>
  <!-- Slider -->
  <link rel="stylesheet" href="./assets/css/slick.min.css"/>
  <link rel="stylesheet" href="./assets/css/slick-theme.min.css"/>

  <!-- main css -->
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/home.css">
  <link rel="stylesheet" href="./assets/css/responsive.css">
  
  <!--  OutSide CSS-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>

<body>

  <header class="header_section">
    <!-- Navbar -->
    <nav>
      <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo">
          <a href="#">UNICAMP</a>
        </div>
        <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name">UNICAMP</span>
            
          </div>
          <ul class="links">
            <li class="<?php if ($page=='home') echo 'active'; ?>"><a href="./index.php">HOME</a></li>
            <li class="<?php if ($page=='admission') echo 'active'; ?>"><a href="./admission.php">Admissions</a></li>
            <li class="<?php if ($page=='event') echo 'active'; ?>"><a href="./event_page.php">Events</a></li>
            <li class="<?php if ($page=='courses') echo 'active'; ?>"><a href="./course.php">Courses</a></li>
            <li class="<?php if ($page=='about') echo 'active'; ?>"><a href="./about_us.php">About Us</a></li>
            <li class="<?php if ($page=='contact') echo 'active'; ?>"><a href="./contact_page.php">Contact us</a></li>
            <!-- <li><a href="#">Faculty</a></li> -->
            <?php
            
            if (isset($_SESSION['login'])) {
              echo'
              <li class=""><a href="./admin/a.php">Dashbord</a></li>
              ';
            }
            else{?>
              <li class="<?php if ($page=='portal') echo 'active'; ?>"><a href="./portal.php">Portal</a></li>
            <?php 
            }
            ?>
            
          </ul>
        </div>

        <div class="search-box">
          <i class="fas fa-search bx-search"></i>
          <div class="input-box">
            <input type="text" placeholder="Search...">
          </div>
        </div>
      </div>
    </nav> 
  </header>