<?php
$page='admin_courses';
include('../include/db.php');
include('./include/admin_header.php');
include('../include/func.inc.php');

    
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row gutters">
            
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="my-4 display-4 text-primary text-center">Add Course</h6>
                                    </div>

                                    
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Course Name:</label>
                                            <input type="text" class="form-control" name="course_name" placeholder="Enter The Event Name">
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
                                                while($row= mysqli_fetch_array($result)):;?>
                                                <option value="<?php echo $row['Full_name'];?>"><?php echo $row['Full_name'];?></option>
                                                <?php
                                                endwhile;
                                                ?>     
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Course Description:</label>
                                            <textarea name="course_des" class="form-control" id="" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>

                                    
                                </div>
                            
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" id="submit" name="course_submit" class="btn btn-primary">Add Course</button>
                                        </div>
                                    </div>
                                </div>

<?php
  if (isset($_POST['course_submit'])) {

    $name=validation($_POST["course_name"]);
    $teacher_name=validation($_POST["teachers_name"]);
    $des=validation($_POST["course_des"]);

    $filename = $_FILES["coures_img"]["name"];
    $tempname = $_FILES["coures_img"]["tmp_name"];	
    $filename=$name.$filename;
    

    if ($name==''|| $teacher_name=="" || $des=='' || $filename=='') {
       echo"Please fill all the fields";
    }
    else{
        $sql="INSERT INTO `course` (`name`, `des`, `teacher_name`, `image`) VALUES ('".$name."', '".$des."', '".$teacher_name."','".$filename."');";

        $result= mysqli_query($conn,$sql);

            if ($result) {
                move_uploaded_file($tempname,"../assets/img/Course_img/"."$filename");
                echo '<div class="alert alert-success" role="alert">Course Inserted Succesfully!</div>';
                header("Refresh: 1");
            }
    }
    
  
    }    
  
?>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">


                    <!-- TABLE -->
                    <div class="card">
                    <div class="card-header border-transparent">
                        <h1 class="card-title text-center "><strong class="text-primary display-4">All Courses</strong></h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body py-2">
                        <div class="table-responsive table-student">
                        <table class="table m-0 table-hover">
                            <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Picture</th>
                                <th>Course Name</th>
                                <th>Coordinator</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead >
                            <tbody>
                                
<?php
  $sql = "SELECT * FROM  course";
  if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        $sn=1;
          while($row = mysqli_fetch_array($result)){
?>
              <tr>
              <td><?php echo $sn?></td>
              <td><img src="../assets/img/Course_img/<?php echo $row['image']?>" style="width: 100px;height: 100px;"></td>
              <td><?php echo $row['name']?></td> 
              <td><?php echo $row['teacher_name']?></td>
              <td style="width:35%"><?php echo $row['des']?></td>           
              <td>
                <a href="edit_course.php?course_id=<?php echo $row['course_id']?>"  type="submit" name="edit" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <a href="courses.php?course_id=<?php echo $row['course_id']?>" name="btn_delete"  type="submit" name="edit" class="btn btn-danger">Delete</a>
              </td>
          </tr>
          <?php
              $sn++;  
          }
      } 
    }
      else{
          echo "No records matching your query were found.";
      }
    

      if (isset($_GET['course_id'])) {
        $delete_sql="DELETE FROM course WHERE course_id={$_GET['course_id']}";
        $result_1=mysqli_query($conn,$delete_sql);

        if ($result_1) {
            echo'<div class="alert alert-success" role="alert">
            Data deleted successfully!
          </div>';

            header("Refresh: 1; URL=courses.php");
            
        }
    }
?>

                                
                            
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
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