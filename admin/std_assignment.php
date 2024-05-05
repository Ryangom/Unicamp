<?php
$page='admin_std_assignment';
include('../include/db.php');
include('./include/admin_header.php');
?>

<div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
        <h6 class="my-4 display-4 text-primary text-center">Assignments</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group ">
                <!-- list group item-->
                <?php


$sql = "SELECT * FROM  assignments";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          $date=date_create($row['due_date']);
            echo'
            <li class="list-group-item mb-5">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <div class="d-flex justify-content-between">
                                <h2 class="mt-0 font-weight-bold mb-2">
                                '. $row['title'].'
                                </h2>

                                <h5>Due '. date_format($date,"M d g:i a").'</h5>
                            </div>
                            <div class="d-flex">
                              <p class="mr-3">By code77</p>  
                              <p>'. $row['post_date'].'</p>  
                            </div>
                            
                            <p class="pt-4">'. $row['description'].'</p>


                            <div class="">
                                <form action="" method="post" class="d-flex justify-content-between align-items-center" enctype="multipart/form-data">
                                
                                <input type="file" name="files" id="">

                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            
                        </div>
                    </div> <!-- End -->
                </li> 
            ';
            
           
        }
    } else{
        echo "No records matching your query were found.";
    }


    if (isset($_POST['submit'])) {
        if (!$_FILES['files']['error']) { //User uploaded new image
            
            
            $std_name=$_SESSION['UserName'];
            $email=$_SESSION['user_email'];

            $filename = $_FILES["files"]["name"];
            $tempname = $_FILES["files"]["tmp_name"];	
            $filename=$email.$filename; 


            
            $sql="INSERT INTO `assignment_store` (`student_name`,`student_email`,`file_name`) VALUES ('".$std_name."', '".$email."', '".$filename."');";

            $result1= mysqli_query($conn, $sql);

            if($result1){
                move_uploaded_file($tempname,"../assets/assignment/"."$filename");
                echo '<div class="alert alert-success" role="alert">Assignment succesfully submited!</div>';
                header("Refresh:4");

            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">Please enter your assignment</div>';
        }

            
            
    } 
};
    



?>

                         
              
            </ul> <!-- End -->
        </div>
    </div>
</div>






<?php


include('./include/admin_footer.php');

?>