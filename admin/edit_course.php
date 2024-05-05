<?php
$page='admin_courses';
include('../include/db.php');
include('./include/admin_header.php');
include('../include/func.inc.php');

$course_id= $_GET['course_id'];

$sql = "SELECT * FROM course where course_id={$course_id}";
$result =mysqli_query($conn,$sql) or die("Query Unsuccessful");
$row= mysqli_fetch_array($result);
    
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row gutters">
            
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="my-4 display-4 text-primary text-center">Edit</h6>
                                    </div>

                                    
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Course Name:</label>
                                            <input type="text" class="form-control" name="course_name" 
                                            value="<?php echo $row['name']; ?>">
                                        </div>
                                    </div>
                                    


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Course Image:</label>
                                            <input type="file" class="form-control" name="coures_img">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Course teachers name:</label>
                                            <select name="teachers_name" class="custom-select" >
                                            <?php
                                            $sql = "SELECT * FROM users where Role_id=2";
                                            $result =mysqli_query($conn,$sql) or die("Query Unsuccessful");
                                                while($row1= mysqli_fetch_array($result)):;?>
                                                <option value="<?php echo $row1['Full_name'];?>"><?php echo $row1['Full_name'];?></option>
                                                <?php
                                                endwhile;
                                                ?>     
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Course Description:</label>
                                            <textarea name="course_des" class="form-control" id="" cols="30" rows="5"><?php echo $row['des']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" id="submit" name="course_submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>

<?php
  if (isset($_POST['course_submit'])) {

    $name=validation($_POST["course_name"]);
    $teacher_name=validation($_POST["teachers_name"]);
    $des=validation($_POST["course_des"]);
    $location="../assets/img/Course_img/".$row['image'];
    

    if ($name==''|| $teacher_name=="" || $des=='') {
       echo"Please fill all the fields";
    }
    else{
        if (!$_FILES['coures_img']['error']) { //User uploaded new image
            unlink($location); //Delete old pic                             

            $filename = $_FILES["coures_img"]["name"];
            $tempname = $_FILES["coures_img"]["tmp_name"];	
            $filename=$name.$filename; 
            
            $sql="UPDATE `course` SET `name` = '".$name."',`des`='".$des."',`teacher_name`='".$teacher_name."', `image` ='".$filename."' WHERE course_id=$course_id";

            $result1= mysqli_query($conn, $sql);

                if($result1){
                    move_uploaded_file($tempname,"../assets/img/Course_img/"."$filename");
                    header("Location:./courses.php");
                }
        } 

        else{

            $sql="UPDATE `course` SET `name` = '".$name."',`des`='".$des."',`teacher_name`='".$teacher_name."' WHERE course_id=$course_id";
            $result1= mysqli_query($conn, $sql);

            if($result1){
                header("Location:./courses.php");

            }
        } 
    }
    
  
    }    
  
?>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
      </div>
    </section>

  </div>






<?php

include('./include/admin_footer.php');

?>