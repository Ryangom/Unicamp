<?php
ob_start();
$page = 'admin_assignment';

include('../include/db.php');
include('./include/admin_header.php');
?>
<section class="content">

    <div class="content-wrapper px-4">
        <div class="container-fluid profile">
            <div class="row gutters">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="my-4 display-4 text-primary text-center">Post Assignment</h6>
                                </div>
                                <?php
                                // insert Assignments
                                if (isset($_POST['submit'])) {
                                    $name = $_POST['name'];
                                    $descr = $_POST['descr'];
                                    $sub_date = $_POST['sub_date'];

                                    $sql = "INSERT INTO `assignments` (`title`, `description`, `due_date`, `post_date`) VALUES ('" . $name . "', '" . $descr . "', '" . $sub_date . "', current_timestamp());";

                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        echo '
                                        <div class="alert alert-success" role="alert">
                                            Data Inserted Succesfully!
                                        </div>
                                        ';
                                        header("Refresh: 1; URL=assignment.php");
                                    } else {
                                        echo "Someting worng";
                                    }
                                }

                                ?>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-100" method="post">

                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="event_name">Title:</label>
                                            <input type="text" class="form-control" name="name" id="event_name" placeholder="Enter The Event Name">
                                        </div>
                                    </div>


                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Description</label>
                                            <textarea class="form-control" name="descr" id="" cols="30" rows="6"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="">Submission Date:</label>
                                            <input type="datetime-local" name="sub_date" class="form-control" id="">
                                        </div>
                                    </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row my-5">
                <!-- Left col -->
                <div class="col-md-12">


                    <!-- TABLE -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h1 class="card-title"><strong class="text-primary">Assignments List</strong></h1>
                        </div>
                        <?php
                        if (isset($_POST['save'])) {
                            echo $_GET['edit'];
                            $sql_as = "SELECT * FROM  assignments";
                            if ($result = mysqli_query($conn, $sql)) {
                                echo "hi";
                            }
                        }
                        ?>
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="table-responsive">
                                <table class="table m-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Discription</th>
                                            <th>Submission Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                            // Show Assignments
                                            $sql = "SELECT * FROM  assignments";
                                            if ($result = mysqli_query($conn, $sql)) {
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $date = date_create($row['due_date']);
                                                        echo '
            <form action="" method="post">
            <tr>
            <td>' . $row['assignment_id'] . '</td>
            <td>' . $row['title'] . '</td>
            <td class="w-50">' . $row['description'] . '</td>
            <td>' . date_format($date, "M d g:i a") . '</td>
            
            <td>

                <a href="edit_assignments.php?edit=' . $row['assignment_id'] . '"  type="submit" name="edit" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <a href="http:assignment.php?edit=' . $row['assignment_id'] . '" type="button" name="btn_delete" class="btn btn-danger">Delete</a>
            </td>
            
        </tr>
        </form>
            ';
                                                    }
                                                } else {
                                                    echo "No records matching your query were found.";
                                                }


                                                if (isset($_GET['edit'])) {
                                                    $delete_sql = "DELETE FROM assignments WHERE assignment_id={$_GET['edit']}";
                                                    $result_1 = mysqli_query($conn, $delete_sql);

                                                    if ($result_1) {
                                                        echo '<div class="alert alert-success" role="alert">
            Data deleted successfully!
          </div>';

                                                        header("Refresh: 1; URL=assignment.php");
                                                        ob_flush();
                                                    }
                                                }
                                            }



                                            ?>




                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->


                </div>
            </div>


            <div class="row my-5">
                <!-- Left col -->
                <div class="col-md-12">


                    <!-- TABLE -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h1 class="card-title"><strong class="text-primary">Assignments Submited</strong></h1>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="table-responsive">
                                <table class="table m-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Student Email</th>
                                            <th>Submited Time</th>
                                            <th>Download</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                            // Show Assignments
                                            $sql = "SELECT * FROM  assignment_store";
                                            if ($result = mysqli_query($conn, $sql)) {
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $time= $row['time'];
                                                        $submetted=date('h:i:s a m/d/Y', strtotime($time));


                                                        
                                                        echo '
                                                            <form action="" method="post">
                                                            <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['student_name'] . '</td>
                                                            <td>' . $row['student_email'] . '</td>
                                                            <td>' . $submetted . '</td>
                                                            
                                                            <td>
                                                            <a href="../assets/assignment/' . $row['file_name'] . '" type="button" name="btn_delete" class="btn btn-success">Download</a>
                                                            </td>
                                                            
                                                        </tr>
                                                        </form>
                                                            ';
                                                    }
                                                } else {
                                                    echo "No records found.";
                                                }


                                                
                                            }



                                            ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                    
                    <!-- /.card -->


                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('./include/admin_footer.php');
?>