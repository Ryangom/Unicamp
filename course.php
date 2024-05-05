<?php
$page="courses";
include("./include/header.inc.php");
include("./include/db.php")
?>
    <main>
        <!-- Courses Page Heading -->
        <section class="flex align_center justify_center _pg_head courses_header"> <!-- Cls need to change --> 
            <h1>Courses</h1>
            <span></span>
        </section>


        <!-- Card Section -->
        <section class="container_full course_card">
            <div class="container  card_section">

<?php
$sql = "SELECT * FROM  course";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $str=$row['des'];
            $t= substr($str,0,150).'.....';
            echo'
            <div class="card" onclick="ok()">
            <a href="">
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
                <!-- <div class="card" onclick="ok()">
                    <a href="">
                        <div class="course_card_img ">
                            <img src="./img/course/large.png" alt="">
                        </div>
                
                        <div class="course_card_contents">
                            <h1>Learn basic javascript form start for beginner.</h1>
                            <p>Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.</p>
                
                            <hr>
                
                            <div class="course_tearcher flex align_center">
                                <img src="./img/course/avater.jpg" alt="">
                                <h3>Ryan Gomes</h3>
                            </div>
                
                        </div>
                    </a>
                </div>
                 -->

                

               
                
                
            </div>
        </section>
    </main>

<?php
$a="home";
include("./include/footer.inc.php");
?>