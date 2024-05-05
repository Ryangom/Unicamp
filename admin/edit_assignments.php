<?php
$page='';
include('../include/db.php');
include('./include/admin_header.php');
?>

<div class="content-wrapper px-4">
    <div class="container-fluid profile">
        <div class="row gutters">
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="my-4 display-4 text-primary text-center">Edit Assignment</h6>
                            </div>

                          
                    <?php
                        $assignment=$_GET['edit'];
                        $sql = "SELECT * FROM  assignments where assignment_id={$assignment} ";
                        $result =mysqli_query($conn,$sql) or die("Query Unsuccessful");

                        if (mysqli_num_rows($result)>0) {
                            while($row= mysqli_fetch_assoc($result)){            
                    ?>
                        <form action="" class="w-100" method="post">
                            

                        <?php
                        if (isset($_POST['submits'])) {

                            $name=trim($_POST['name']) ;
                            $descr=trim($_POST['descr']) ;
                            $sub_date=$_POST['sub_date'];
                    
                            $sql11="UPDATE `assignments` SET `title` = '".$name."', `description` = '".$descr."', `due_date` = '".$sub_date."' WHERE `assignments`.`assignment_id` = {$_GET['edit']}";

                            $result11= mysqli_query($conn, $sql11);
                            if($result11){
                                echo'
                                <div class="alert alert-success" role="alert">
                                    This is a success alert—check it out!
                                </div>
                                ';
                                header("Location:./assignment.php");
                                
                            }

                        }
                        ?>
                                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="event_name">Title:</label>
                                        <input type="text" name="name" value="<?php echo $row['title'];?>" class="form-control" name="name" id="event_name" placeholder="Enter The Event Name">
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Description</label>
                                        <textarea class="form-control" name="descr" id="" cols="30" rows="6"><?php echo trim($row['description']) ?></textarea>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">


                                    <?php 
                                    
                                    $DueDate = $row['due_date'];
                                    $DueDate = strtotime($DueDate);
                                    $newDate = date('Y-m-d\TH:i', $DueDate);
                                    
                                    ?>
                                        <label for="">Submission Date:</label>
                                        <input type="datetime-local" value="<?php echo $newDate?>" name="sub_date" class="form-control" id="">
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" id="submit" name="submits" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                            

                        </form>

                        <?php
                        };
                    };
                        ?>
                    </div>
                </div>
            </div>

            </div>
        </div>
</div>


<?php
    
    include('./include/admin_footer.php');
?>