<?php

$page='admin_profile';
include('../include/db.php');
include('./include/admin_header.php');

?>
<?php
                                                                
    $userid=$_SESSION['user_id'];

    $sql = "SELECT * FROM  users where User_id=$userid LIMIT 1";
    $result =mysqli_query($conn,$sql) or die("Query Unsuccessful");
    $row    = mysqli_fetch_array($result);

?>   
<div class="content-wrapper">
    <div class="container mt-5 profile">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings py-3">

                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="../assets/img/Profile_pic/<?php echo $row['Profile_pic']?>" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name pt-3 text-center"><?php echo $row['Full_name'];?></h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Personal Details</h6>
                            </div>

                                             

                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name:</label>
                                    <input type="text" value="<?php echo $row['Full_name'] ?>" name="Full_name" class="form-control" id="fullName">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Address:</label>
                                    <input type="text" value="<?php echo $row['Address'] ?>" name="Addess" class="form-control" id="fullName">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Email:</label>
                                    <input type="email" value="<?php echo $row['Email'] ?>" name="Email" class="form-control" id="fullName">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Contact Number:</label>
                                    <input type="number" value="<?php echo $row['Contact_number'] ?>" name="Contact_number" class="form-control" id="eMail">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Date of Birth:</label>
                                    <input type="date" value="<?php echo $row['dob'] ?>" name="dob" class="form-control" id="phone">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Update Your Profile Picture:</label>
                                    <input type="file" name="profile_pic" class="form-control" >
                                </div>
                            </div>
                            
                        </div>
                        

    <?php

    if (isset($_POST['submit'])) {

        $Fullname=trim($_POST['Full_name']);
        $address=trim($_POST['Addess']) ;
        $email=$_POST['Email'];
        //$gender=$_POST['Gender'];
        $contact_num=$_POST['Contact_number'];
        $dob=$_POST['dob'];                          
        $location="../assets/img/Profile_pic/".$row['Profile_pic'];

        // echo $location;

            if (!$_FILES['profile_pic']['error']) { //User uploaded new image
                                             

                $filename = $_FILES["profile_pic"]["name"];
                $tempname = $_FILES["profile_pic"]["tmp_name"];	
                $filename=$email.$filename; 

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $allowed = array('jpg','png');
                if( ! in_array( $ext, $allowed ) ) {
                    echo '<div class="alert alert-danger" role="alert">Invalid File Type. jpg and png format is acceptable</div>';
                }else{
                    unlink($location); //Delete old pic
                    $sql="UPDATE `users` SET `Full_name` = '".$Fullname."',`Address`='".$address."',`Email`='".$email."', `Contact_number` ='".$contact_num."',`dob`='".$dob."',`Profile_pic`='".$filename."' WHERE User_id=$userid";

                    $result1= mysqli_query($conn, $sql);

                    if($result1){
                        move_uploaded_file($tempname,"../assets/img/Profile_pic/"."$filename");
                        header("Refresh:0");

                    }
                }

                
                
            } 

            else{
            $sql="UPDATE `users` SET `Full_name` = '".$Fullname."',`Address`='".$address."',`Email`='".$email."', `Contact_number` ='".$contact_num."',`dob`='".$dob."' WHERE User_id=$userid";
            $result1= mysqli_query($conn, $sql);

            if($result1){
                header("Refresh:0");

                }
            } 
        
        
    }              
    ?>

                        
                        <div class="row gutters">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-left">
                                    <a href="../forget_pass.php"  class="btn btn-primary">Change Password</a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include('./include/admin_footer.php');

?>