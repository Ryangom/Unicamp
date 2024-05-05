<?php
$page="home";
include("./include/header.inc.php");
include("./include/db.php");
include("./include/func.inc.php");
?>
  
  
  <main>
    <!-- Header Slider -->
    <section class="slideshow">
      <div class="slider">
    
        <div class="item">
          <div class="overlay">
          <img src="./assets/img/pg_home/slider_1.jpg" /> 
        </div>
          <div class="container slide_section ">
    
            <div class="silde_sec_containt">
              <h1>Discover the world of possibility with UniCamp!</h1>
              <h3>Fall 2020 Applications are Now Open</h3>
              <a href="./admission.php" class="btn">Admissions</a>
            </div>
            
          </div>
        </div>
    
        <div class="item">
          <div class="overlay">
          <img src="./assets/img/pg_home/slider_2.jpg" /> 
        </div>
          <div class="container slide_section ">
    
            <div class="silde_sec_containt">
              <h1>Discover the world of possibility with UniCamp!</h1>
              <h3>Fall 2020 Applications are Now Open</h3>
              <a href="./admission.php" class="btn">Admissions</a>
            </div>
            
          </div>
        </div>
    
    
        <div class="item">
          <div class="overlay">
            <img src="./assets/img/pg_home/slider_3.jpg" /> 
          </div>
          
          <div class="container slide_section">
    
            <div class="silde_sec_containt">
              <h1>Discover the world of possibility with UniCamp!</h1>
              <h3>Fall 2020 Applications are Now Open</h3>
              <a href="./admission.php" class="btn">Admissions</a>
            </div>
            
          </div>
        </div>
        
    
      </div>
    </section>



    <!-- ABOUT -->

    <section class="about container flex">
      <div class="about_right animate__animated animate__fadeInDown animate__delay-1s ">
        <img src="./assets/img/pg_home/AboutUs.jpg" alt="">
      </div>

      <div class="about_left flex justify_center align_center">
        <div class="about_contents">
          <h1>Welcome to UniCamp</h1>
          <p>
          Founded in 1764, UniCamp is a leading research university home to world-renowned faculty, and also an innovative educational institution where the curiosity, creativity and intellectual joy of students drives academic excellence.
  <br>
  <br>
The spirit of the undergraduate Open Curriculum infuses every aspect of the University. UniCamp is a place where rigorous scholarship, complex problem-solving and service to the public good are defined by intense collaboration, intellectual discovery and working in ways that transcend traditional boundaries.
        </p>
        <a href="./about_us.php" class="btn">Read more</a>
        </div>
        
      </div>
      
    </section>

    <!-- COURSES -->
    <section id="courses">
      <div class="container flex justify_center align_center flex_col">

        <div class="_headline">
          <h1>OUR COURSES</h1>
          <span></span>
        </div>
        
        <div class="container ">
           
          <div class="card_section home_course_sec">        
<?php
  $sql = "SELECT * FROM  course";
  if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){
              $str=$row['des'];
              $t= substr($str,0,150).'.....';
              echo'
              <div class="card">
              <a href="./course.php">
                  <div class="course_card_img ">
                      <img src="./assets/img/Course_img/'.$row['image'].'" alt="">
                  </div>
          
                  <div class="course_card_contents">
                      <h1>'.$row['name'].'</h1>
                      <p>'.$t.'</p>
          
                      <hr>
          
                      <div class="course_tearcher flex align_center">
                          <h3>By '.$row['teacher_name'].'</h3>
                      </div>
          
                  </div>
              </a>
          </div>
              ';
              
            
        }
      } 
      else{
          echo "No records matching your query were found.";
      }
  }
?>           
        </div>

      </div>
        <a class="btn" href="./course.php">Learn More!</a>
      </div>
      
    </section>

    <!-- Admissions -->
    <section id="admission_section">
      <div class="parallax pg_home_parallax">
        <div class="admission_box">
          <h1>Apply for Admissions</h1>
          <span>.</span>
          <p>At UniCamp College we don’t expect intelligence to come in any particular shape or form. We’re looking for future students who are inquisitive, passionate, original and determined to grow.</p>
          <a href="./admission.php">Apply Now!</a>

        </div>
      </div>
    </section>


    <!-- INFO  -->
    <Section id="Info">
      <div class="container flex info_box ">

        <div class="flex flex_col info_box_contents ">
          <img src="./assets/img/pg_home/reading.svg" alt="" srcset="">
          <span>5,023</span>
          <p>Students Enrolled</p>
        </div>



        <div class="flex flex_col info_box_contents ">
          <img src="./assets/img/pg_home/presentation.svg" alt="" srcset="">
          <span>26</span>
          <p>Certified Teachers</p>
        </div>


        <div class="flex flex_col info_box_contents ">
          <img src="./assets/img/pg_home/graduated.svg" alt="" srcset="">
          <span>5,023</span>
          <p>Completed Graduates</p>
        </div>

        
        <div class="flex flex_col info_box_contents ">
          <img src="./assets/img/pg_home/suitcase.svg" alt="" srcset="">
          <span>80%</span>
          <p>Students Employed</p>
        </div>
      </div>
    </Section>

    <!-- Upcoming Events -->
    <section id="upcoming_event">
      <div class="_headline">
        <h1>Upcoming Events</h1>
        <span></span>
      </div>


      <div class="container upcoming_event_main">
        <div class="event_contents flex">




<?php
$sql = "SELECT * FROM  event ORDER BY `Date` LIMIT 1";
if($result = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $date=date_create($row['Date']);
        $start=$row['start_time'];
        $end=$row['end_time'];
        $str=$row['Event_title'];
        $t= substr($str,0,40).'..';
            echo'
            <div class="event_left">
            <a href="./event_page.php">
            <img src="./assets/img/Event_img/'. $row['img'].'" alt="" srcset="">
            </a>
          <div class="event_left_texts">
            <span>'.date_format($date,"F d, Y").'</span>
            <h1>'. $t.'</h1>
            <p class="up_event_time">'. date("g:i A", strtotime($start)).'-'.date("g:i A", strtotime($end)).'</p>
          </div>
        </div>
            ';
            
           
      }
    } else{
        echo "No records matching your query were found.";
    }
}
?>

          <div class="event_right">

<?php
$sql = "SELECT * FROM  event ORDER BY `Date` LIMIT 2 OFFSET 1";
if($result = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $date=date_create($row['Date']);
        $start=$row['start_time'];
        $end=$row['end_time'];
        $str=$row['Event_title'];
        $t= substr($str,0,40).'..';
            echo'
            <div class="event_card">
              <a href="./event_page.php" >
              <div class="event_right_img">
                <img src="./assets/img/Event_img/'. $row['img'].'" alt="">
                <div class="a">
                  <span>'. date_format($date,"F d, Y").'</span>
                </div>
              </div>

              <div class="event_right_texts">
                <h1>'. $t.'</h1>
                <p class="up_event_time">'. date("g:i A", strtotime($start)).'-'.date("g:i A", strtotime($end)).'</p>
              </div>
            </a>
            </div>
            ';
            
           
        }
    } else{
        echo "No records matching your query were found.";
    }
}
?>

            

            
          </div>
          



        </div>

        <div class="ss">
          <a href="./event_page.php" class="btn">More UniCamp Events</a>
        </div>

      </div>

    </section>

    <!-- Newsletter -->
    <section id="news_letter">
      <div class="news_letter_contents">
        <h1>Get the latest news<br>delivered to you.</h1>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="news_input">

          
            <input type="text" required value="" name="email" placeholder="Enter Your E-mail">
            <button type="submit" name="submit">Subscribe!</button>

            
        </form>
        <?php
              if(isset($_POST['submit'])){
                  if($_POST['email']==""){
                    echo'<div class="danger" role="alert">Please Enter your Email..!</div>';
                    echo"hi";
                  }else{
                    $email=$_POST['email'];
                    $sql="SELECT * FROM news_letter WHERE User_email='".$email."'";
                    $result=mysqli_query($conn,$sql);

                      if(mysqli_num_rows($result)==1){
                        echo'<div class="danger" role="alert">Email id already have newsletter..</div>';                                              
                      }
                      else{
                        $sql1="INSERT INTO `news_letter` (`User_email`) VALUES ('{$email}')";
                        $result1=mysqli_query($conn,$sql1);

                        if($result1){
                          echo'<div class="success" role="alert">Thank you for Subscribing our newsletter..</div>';
                          
                        }
                        else{
                          echo'<div class="danger" role="alert">Please Try again later..</div>';
                        } 
                      }

                    

                    
                  }
              }
            ?>
      </div>
    </section> 
    
  </main>



<?php
$a="home";
include("./include/footer.inc.php");
?>