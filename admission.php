<?php
$page="admission";
include("./include/db.php");
include("./include/header.inc.php");
include("./include/func.inc.php");
?>
    <main>
        <section class="flex align_center justify_center _pg_head admission_head">
            <h1>Admisstion Now</h1>
            <span></span>
        </section>


        <section class="admission_main">
            <div class="container admisstion_form_sec">
                <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">


                <?php
                // Get data
                              
                if(isset($_POST['submit'])){
                    $applicant_type=validation($_POST['applicant_type']);
                    $completed_degree=validation($_POST['completed_d']);
                    $Program=validation($_POST['program']);
                    $fullname=validation($_POST['name']);
                    $Student_pic=$_FILES['photo'];
                    $father=validation($_POST['father']);
                    $mother=validation($_POST['mother']);
                    $address=validation($_POST['address']);
                    $dob=validation($_POST['dob']);
                    $gender=validation($_POST['gender']);
                    $email=validation($_POST['email']);
                    $contact_number=validation($_POST['contact_num']);
                    
                    if (empty($applicant_type) || empty($completed_degree) || empty($Program)|| empty($fullname)|| empty($father)|| empty($mother)|| empty($address)|| empty($dob) || empty($gender)|| empty($email) || empty($contact_number)) {

                        echo"<div class='danger'>Please Fill all the * mark fileds.</div>";
                    }
                    else{

                        $filename = $_FILES["photo"]["name"];
                        $tempname = $_FILES["photo"]["tmp_name"];	
                        $filename=$email.$filename;

                        $sql="INSERT INTO `admission` (`applicant_type`, `completed_degree`, `program`, `full_name`,`picture`,`father_name`,`mother_name`,`address`,`dob`,`gender`,`email`,`contact_number`) VALUES ('".$applicant_type."', '".$completed_degree."', '".$Program."','".$fullname."','".$filename."','".$father."','".$mother."','".$address."','".$dob."','".$gender."','".$email."','".$contact_number."');";

                        $result= mysqli_query($conn,$sql);
                        if ($result) {
                        move_uploaded_file($tempname,"./assets/img/admission/"."$filename");
                        echo '<div class="success" role="alert">Data Inserted Succesfully!</div>';
                        header("Refresh:4");                       
                        }

                        else{
                            echo'<div class="danger" role="alert">Please Try again later..!</div>';
                        }
                    }
                };
                ?>

                    <h1>General Information</h1>
                    <!-- Genaral Info -->
                    <div class="form_row ax flex justify_between">
                        <div class="input_box">
                            <label for="">Applicant type *</label> <br>
                            <!-- <input type="" name="" id=""> -->
                            <select name="applicant_type" id="">
                                <option value="" >Select</option>
                                <option value="Local Student">Local Student</option>
                                <option value="International Student">International Student</option>
                            </select>
                        </div>
                        <div class="input_box">
                            <label for="">Last Completed Degree *</label> <br>
                            <select name="completed_d" id="">
                                <option value="" >Select Last Completed Degree</option>
                                <option value="HSC/Alim">HSC/Alim</option>
                                <option value="A-Level">A-Level</option>
                            </select>
                        </div>
 
                    </div>

                    <div class="form_row ax flex justify_between">
                        
                        <div class="input_box">
                            <label for="">Select Programs *</label> <br>
                            <select name="program" id="">
                                <option value="" >Select Program</option>
                                <option value="B.Sc in computer science">B.Sc in computer science</option>
                                <option value="BBA">BBA</option>
                                <option value="Graphic Design">Grapic Design</option>
                            </select>
                        </div>
                    </div>



                    <!-- Personal Info -->
                    
                    <div class="m-2">
                        <h1>Student Personal Information</h1>
                        <div class="form_row flex justify_between">
                            <div class="input_box">
                                <label for="">Student's Full Name *</label> <br>
                                <input type="text" name="name" id="">
                            </div>
                            <div class="input_box">
                                <label for="">Student photo *</label> <br>
                                <input type="file" name="photo" id="">
                                <small>Photo must be in passport size. Max upload size 2mb</small>
                            </div>
                            
                        </div>

                        <div class="form_row flex justify_between">
                            <div class="input_box">
                                <label for="">Father's Name *</label> <br>
                                <input type="text" name="father" id="">
                            </div>
                            <div class="input_box">
                                <label for="">Mother's Name *</label> <br>
                                <input type="text" name="mother" id="">
                            </div>
                        </div>

                        <div class="form_row flex justify_between">
                            <div class="input_box">
                                <label for="">Present address *</label> <br>
                                <input type="text" name="address" id="">
                            </div>
                            <div class="input_box">
                                <label for="">Date of birth *</label> <br>
                                <input type="date" name="dob" id="">
                            </div>
                        </div>
                        <div class="form_row flex justify_between">
                            <div class="input_box">
                                <label for="">Gender *</label> <br>
                                <select name="gender" id="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <label for="">Contact Number *</label> <br>
                                <input type="number" name="contact_num" id="">
                            </div>
                        </div>

                        <div class="form_row flex justify_between">
                            
                            <div class="input_box">
                                <label for="">Email Address *</label> <br>
                                <input type="email" name="email" id="">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" name="submit" class="btn">Submit</button>

                


                
                
                
              


                </form>
            </div>
        </section>

    </main>

<?php
$a="home";
include("./include/footer.inc.php");
?>