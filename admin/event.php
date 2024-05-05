<?php
$page='admin_event';
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
                                        <h6 class="my-4 display-4 text-primary text-center">Add Events</h6>
                                    </div>

                                    
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Enter Event Name:</label>
                                            <input type="text" class="form-control" name="event_name" placeholder="Enter The Event Name">
                                        </div>
                                    </div>                                  

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Event Picture:</label>
                                            <input type="file" class="form-control" name="event_img">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Enter Event Date:</label>
                                            <input type="date" class="form-control" name="event_date" min="<?php echo date('Y-m-d'); ?>" placeholder="Enter The Event Name">
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Starts Time:</label>
                                            <input type="time" class="form-control" name="event_start" >
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Ends Time:</label>
                                            <input type="time" class="form-control" name="event_end" >
                                        </div>
                                    </div>
                                    
                                </div>
                            
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" id="submit" name="event_submit" class="btn btn-primary">Add Event</button>
                                        </div>
                                    </div>
                                </div>

<?php
  if (isset($_POST['event_submit'])) {

    $name=validation($_POST["event_name"]);
    $event_date=$_POST["event_date"];
    $start=$_POST["event_start"];
    $end=$_POST["event_end"];

    $filename = $_FILES["event_img"]["name"];
    $tempname = $_FILES["event_img"]["tmp_name"];	
    $filename=$name.$filename;

    
    

    if ($name==''|| $event_date=="" || $start=='' || $end=='' || $filename=='') {
       echo"Please fill all the fields";
    }
    else{
        $sql="INSERT INTO `event` (`Event_title`, `Date`, `start_time`,`end_time`, `img`) VALUES ('".$name."', '".$event_date."', '".$start."','".$end."','".$filename."');";

        $result= mysqli_query($conn,$sql);

            if ($result) {
                move_uploaded_file($tempname,"../assets/img/Event_img/"."$filename");
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
                        <h1 class="card-title text-center "><strong class="text-primary display-4">All Upcoming Events</strong></h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body py-2">
                        <div class="table-responsive table-student">
                        <table class="table m-0 table-hover">
                            <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Event Picture</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Start time</th>
                                <th>End time</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead >
                            <tbody>
                                
<?php
  $sql = "SELECT * FROM  event";
  if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        $sn=1;
          while($row = mysqli_fetch_array($result)){
?>
              <tr>
              <td><?php echo $sn?></td>
              <td><img src="../assets/img/Event_img/<?php echo $row['img']?>" style="width: 100px;height: 100px;"></td>
              <td><?php echo $row['Event_title']?></td>
              <td><?php echo $row['Date']?></td> 
              <td><?php echo $row['start_time']?></td>
              <td ><?php echo $row['end_time']?></td>           
              <td>
                <a href="edit_event.php?event_id=<?php echo $row['Event_id']?>"  type="submit" name="edit" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <a href="event.php?event_id=<?php echo $row['Event_id']?>"  name="btn_delete"  type="submit" name="edit" class="btn btn-danger">Delete</a>
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
    

      if (isset($_GET['event_id'])) {
        $delete_sql="DELETE FROM event WHERE Event_id={$_GET['event_id']}";
        $result_1=mysqli_query($conn,$delete_sql);

        if ($result_1) {
            echo'<div class="alert alert-success" role="alert">
            Data deleted successfully!
          </div>';

            header("Location:event.php");
            
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