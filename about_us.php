<?php
$page="about";
include("./include/header.inc.php");
?>
    <main>
    <section class="flex align_center justify_center _pg_head about_head">  <!-- Cls needs to be change -->
        <h1>About US</h1>
        <span></span>
    </section>

    <!-- This Section Comes from Home page -->
    <section class="about container flex pg_about">

        <div class="about_left flex justify_center align_center ">
          <div class="about_contents">
            <h1>Our education system inspires the next generation.</h1>
            <p>Founded in 1764, Brown is a leading research university home to world-renowned faculty, and also an innovative educational institution where the curiosity, creativity and intellectual joy of students drives academic excellence.
            <br>
<br>
The spirit of the undergraduate Open Curriculum infuses every aspect of the University. Brown is a place where rigorous scholarship, complex problem-solving and service to the public good are defined by intense collaboration, intellectual discovery and working in ways that transcend traditional boundaries.

          </p>
          <!-- <a href="#" class="btn">Read more</a> -->
          </div>
          
        </div>
        <div class="about_right">
          <img src="./assets/img/pg_about/pg_about_hero.jpg" alt="">
        </div>
        
    </section>

    <section id="about_us_page">
        <div class="parallax about_parallax">
        <div class="container m">
            <div class="about_us_content_sec ">
                <div class="about_us_content flex">

                    <div class="left">
                        <!-- <img src="./assets/even_1.jpg" alt="" srcset=""> -->
                        <video src="./assets/img/pg_about/about_bg.mp4" loop muted autoplay></video>
                    </div>

                    <div class="right">
                        <h1>UniCamp University</h1>
                        <p>
                        UniCamp students and faculty are tackling the nation’s opioid crisis. Planning the next Mars landing site. Uncovering the locations of ancient civilizations. Advising world leaders on new political models. Exploring new frontiers in multimedia arts. In each of their intellectual endeavors, our scholars and researchers are uncommonly driven by the belief that their work must — and will — have an impact in their communities, in society and the world.
<br>
<br>
We are a learning community grounded in a commitment of respect for the diversity of viewpoints that is fundamentally essential to intellectual discovery. We encourage the right of all individuals to express ideas and perspectives — and we embrace the value of vigorous debate in pursuit of knowledge.
                        </p>
                    </div>

                    
                </div>

                <div class="about_pg_info flex justify_space_around">
    
                    <div class="about_pg_info_sec">
                        <span>18</span>
                        <p>Certified Teachers</p>
                    </div>  
                    <div class="about_pg_info_sec">
                        <span>5000+</span>
                        <p>Students</p>
                    </div> 
                    <div class="about_pg_info_sec">
                        <span>30</span>
                        <p>Courses</p>
                    </div> 
                    <div class="about_pg_info_sec">
                        <span>50</span>
                        <p>Awards Won</p>
                    </div>       

                </div>
            </div>
        </div>
    </div>
    </section>

</main>

<?php
$a="home";
include("./include/footer.inc.php");
?>
