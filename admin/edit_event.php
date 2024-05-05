<?php
$page='';
include('../include/db.php');
include('./include/admin_header.php');
include('../include/func.inc.php');



$event_id=$_GET['event_id'];
                                                            
$sql = "SELECT * FROM  event where Event_id='$event_id' LIMIT 1";
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
                                    <h6 class="my-4 display-4 text-primary text-center">Edit Event Information</h6>
                                </div>

<!-- GET data from db and show -->                      
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="event_name">Enter Event Name:</label>
                                <input type="text" name="event_name" value="<?php echo $row['Event_title']?>" class="form-control">
                            </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Event Picture:</label>
                                    <input type="file" name="event_img" class="form-control">
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="">Enter Event Date:</label>
                                    <input type="date" name="event_date" value="<?php echo $row['Date']?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="event_name">Starts Time:</label>
                                    <input type="time" name="event_start" value="<?php echo $row['start_time']?>" class="form-control">
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Ends Time:</label>
                                    <input type="time" name="event_end" value="<?php echo $row['end_time']?>" class="form-control">
                                </div>
                            </div>                       
                            </div>
                            <?php

if (isset($_POST['submit'])) {

    $name=validation($_POST["event_name"]);
    $event_date=$_POST["event_date"];
    $start=$_POST["event_start"];
    $end=$_POST["event_end"];

    $filename = $_FILES["event_img"]["name"];
    $tempname = $_FILES["event_img"]["tmp_name"];	
    $filename=$name.$filename;
    $location="../assets/img/Event_img/".$row['img'];
    // echo $location;

        if (!$_FILES['event_img']['error']) { //User uploaded new image
            unlink($location); //Delete old pic                             
            
            $sql="UPDATE `event` SET `Event_title`='".$name."',`Date`='".$event_date."', `start_time` ='".$start."',`end_time`='".$end."',`img`='".$filename."' WHERE Event_id=$event_id";

            $result1= mysqli_query($conn, $sql);

                if($result1){
                    move_uploaded_file($tempname,"../assets/img/Event_img/"."$filename");
                    header("Location:./event.php");

                }
        } 

        else{
            $sql="UPDATE `event` SET `Event_title`='".$name."',`Date`='".$event_date."', `start_time` ='".$start."',`end_time`='".$end."' WHERE Event_id=$event_id";
            $result1= mysqli_query($conn, $sql);

        if($result1){
            header("Location:./event.php");

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