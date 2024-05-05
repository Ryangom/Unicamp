
<!-- Footer -->
<footer class="container_full" id="footer">
  <div class="footer_content container flex ">

      <div class="footer_left">
          <div class="footer_left_content">
          
              <!-- <img src="" alt=""> -->
              <h1>UNI CAMP</h1>

              <p>Brown is a leading research university, where stellar faculty and student researchers deploy deep content knowledge to generate new discoveries on those issues and many more.</p>
          </div>
      </div>


      <div class="footer_right flex ">
          <div class="footer_link flex flex_col">
              <h2>About</h2>
              <a href="http://">About Us</a>
              <a href="http://">Courses</a>
              <a href="http://">News</a>
              <a href="http://">Events</a>
              <a href="http://">Contact</a>
          </div>
          <div class="footer_link flex flex_col">
              <h2>Links</h2>
              <a href="http://">Students</a>
              <a href="http://">Alumni</a>
              <a href="http://">Visit</a>
          </div>
          <div class="footer_link ">
              <h2>Social Media</h2>
              <div class="flex media_i">
                  <a href="http://">
                      <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="http://">
                      <i class="fab fa-twitter"></i>
                  </a>
                  <a href="http://">
                      <i class="fab fa-instagram"></i>
                  </a>
                  <a href="http://"> 
                      <i class="fab fa-youtube"></i>
                  </a>
              </div>
              
              
          </div>
          
      </div>
 </div>
 
  <div class="footer_copy_right container">
      <p>&copy;2021 UniCamp All Rights Resoved</p> 
  </div> 
</footer>



<script src="./assets/js/jquery-2.2.4.min.js"></script>
<script src="./assets/js/jquery.easing.min.js"></script>
<script src="./assets/js/slick.min.js"></script>


<script src="./assets/js/main.js"></script>
<?php

if ($a=="home") {
    echo"<script>
    $('.slider').slick({
    draggable: true,
    arrows: false,
    dots: true,
    // fade: true,
    pauseOnHover:false,
    speed: 2000,
    autoplaySpeed:4000,
    infinite: true,
    autoplay:true,
    touchThreshold: 100
  })
    </script>";
}
ob_end_flush();
?>

  <!-- Initialize Slider -->
  
</body>

</html>
