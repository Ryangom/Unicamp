<?php
$page="contact";
include("./include/header.inc.php");
include("./include/db.php");
?>
    <main>
        <!-- Contact Page Heading -->
        <section class="flex align_center justify_center _pg_head contact_head">
            <h1>Contact Us</h1>
            <span></span>
        </section>

        <!-- Main -->
        <section class="contact_form_section">

            <div class="container flex justify_between s">
                <div class="contact_info_section">
                    <h1>Don't be shy, <br><span>say hi.</span></h1>

                    <p>Use our Contact Details Finder to find specific faculty or department contact details without knowing a member of staff's name.</p>

                    <div class="contact_info">
                        <div class="info_content flex align_center">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>1826 Locust Steet, London, UK</p>
                        </div>
                        <div class="info_content flex align_center">
                            <i class="fas fa-mobile-alt"></i>
                            <p>401-863-1000</p>
                        </div>
                        <div class="info_content flex align_center">
                            <i class="fas fa-envelope"></i>
                            <p>Unicamp@gmail.com</p>
                        </div>

                    </div>
                </div>

                <div class="contact_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                        <div class="form_row flex justify_between">
                            <div class="input_box">
                                <label for="">Full Name:</label> <br>
                                <input type="text" name="name" id="">
                            </div>
                            <div class="input_box">
                                <label for="">Email:</label> <br>
                                <input type="text" name="email" id="">
                            </div>
                        </div>
                        

                        <div class="form_row flex justify_between">
                            <div class="input_box_textarea">
                                <label for="">Message:</label> <br>
                                <textarea name="messages"></textarea>
                            </div>
                            
                        </div>
                        
                        <div class="form_row flex justify_between">
                            <button class="btn" name="submit" type="submit">Sent Message</button>
                            
                        </div>

                        <?php
                            if (isset($_POST['submit'])) {

                                $name=$_POST['name'];
                                $email=$_POST['email'];
                                $message=$_POST['messages'];

                                if (empty($name)||empty($email)||empty($message)) {
                                   echo'<div class="danger">Please fill out the missing fields</div>';
                                }
                                else{
                                    $sql="INSERT INTO `conatact_us` (`Full_name`, `Email`, `Messages`) VALUES ('".$name."', '".$email."', '".$message."')";
                                    $result= mysqli_query($conn,$sql);

                                    if ($result) {
                                        echo'<div class="success">Thank you for submitting your question. We will contact you soon.</div>';
                                    }



                                }
                            }
                        
                        ?>
                        

                    </form>
                </div>
            </div>

        </section>

        <!-- Map -->
        <section class="container_full contact_map_section">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1737.6221882978507!2d-98.48650795000005!3d29.421653200000023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865c58aa57e6a56f%3A0xf08a9ad66f03e879!2sHenry+B.+Gonzalez+Convention+Center!5e0!3m2!1sen!2sus!4v1393884854786" frameborder="0" style="border:0"></iframe>
        </section>

    </main>



<?php
$a="home";
include("./include/footer.inc.php");
?>