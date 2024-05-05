<?php
$page='';
include('../include/db.php');
include('./include/admin_header.php');



$userid=$_GET['update'];
                                                            
$sql = "SELECT * FROM  users where User_id='$userid' LIMIT 1";
$result =mysqli_query($conn,$sql) or die("Query Unsuccessful");
$row    = mysqli_fetch_array($result);
?>


<div class="content-wrapper px-4">
    <div class="container-fluid profile">
        <div class="row gutters">
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="<?php $_SERVER["PHP_SELF"]?>" class="w-100" method="post" enctype="multipart/form-data">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="my-4 display-4 text-primary text-center">Edit </h6>
                                </div>

<!-- GET data from db and show -->                      
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="event_name">Name:</label>
                                
                                <input type="text" name="Full_name" value="<?php echo $row['Full_name']?>" class="form-control">
                            </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Address</label>
                                    <input type="text" name="Addess" value="<?php echo $row['Address']?>" class="form-control">
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="">Email address</label>
                                    <input type="email" name="Email" value="<?php echo $row['Email']?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="">Profile Picture</label>
                                    <input type="file" name="profile_pic" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="">Gender:</label>
                                    <select name="gender" class="form-control">
                                        <option  selected>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="event_name">Date of Birth</label>
                                    <input type="date" name="dob" value="<?php echo $row['dob']?>" class="form-control">
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Contact Number</label>
                                    <input type="number" name="Contact_number" value="<?php echo $row['Contact_number']?>" class="form-control">
                                </div>
                            </div>                       
                            </div>
<?php
    
    if (isset($_POST['submit'])) {

        $Fullname=$_POST['Full_name'];
        $address=$_POST['Addess'];
        $email=$_POST['Email'];
        $contact_num=$_POST['Contact_number'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];

        $location="../assets/img/Profile_pic/".$row['Profile_pic'];

        if ($gender=='' ||$gender=='Select' ) {
            echo '<div class="alert alert-danger" role="alert">Please select gender!</div>';
         }
         else{
            if (!$_FILES['profile_pic']['error']) { //User uploaded new image
                unlink($location); //Delete old pic                             
    
                $filename = $_FILES["profile_pic"]["name"];
                $tempname = $_FILES["profile_pic"]["tmp_name"];	
                $filename=$email.$filename; 
                
                $sql="UPDATE `users` SET `Full_name` = '".$Fullname."',`Address`='".$address."',`Email`='".$email."', `Contact_number` ='".$contact_num."',`Gender`='".$gender."',`dob`='".$dob."',`Profile_pic`='".$filename."' WHERE User_id=$userid";
    
                $result1= mysqli_query($conn, $sql);
    
                    if($result1){
                        move_uploaded_file($tempname,"../assets/img/Profile_pic/"."$filename");
                        header("Location:a.php");
    
                    }
            } 
    
            else{
                $sql="UPDATE `users` SET `Full_name` = '".$Fullname."',`Address`='".$address."',`Email`='".$email."', `Contact_number` ='".$contact_num."',`Gender`='".$gender."',`dob`='".$dob."' WHERE User_id=$userid";
                $result1= mysqli_query($conn, $sql);
    
                if($result1){
                    
                        header("Location:a.php");
                    
                    
                }
            }
         }

          
    }

        
    
?>                            
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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