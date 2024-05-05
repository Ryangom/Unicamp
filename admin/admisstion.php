<?php
ob_start();
$page='admin_admission';
include('../include/db.php');
include('./include/admin_header.php');
include('../include/func.inc.php');

$query  = "SELECT * FROM  admission";
$result   = mysqli_query($conn, $query);
$row1    = mysqli_fetch_array($result);
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="my-3">New Admission</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- TABLE -->
            <div class="card">
              <div class="card-header border-transparent">

                <h1 class="card-title text-center"><strong class="text-primary display-4">New Admission</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body py-2">
                <div class="table-responsive table-student">
                  <table class="table m-0">

                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Image</th>
                        <th>Applicant Type</th>
                        <th>Completed Degree</th>
                        <th>Program</th>
                        <th>Name</th>
                        <th>Father</th>
                        <th>Mother</th>
                        <th>Address</th>
                        <th>Dob</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Approve</th>
                        <th>Deny</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                        $query  = "SELECT * FROM  admission";
                        $result   = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                              $sn=1;
                                while($row = mysqli_fetch_array($result)){
                                  ?>

                                    <tr>
                                    <td><?php echo $sn?></td>
                                    <td><img src="../assets/img/admission/<?php echo $row['picture']?>" style="width: 50px;height: 50px;"></td>
                                    <td><?php echo $row['applicant_type']?></td> 
                                    <td ><?php echo $row['completed_degree']?></td>
                                    <td><?php echo $row['program']?></td>
                                    <td ><?php echo "0".$row['full_name']?></td>
                                    <td><?php echo $row['father_name']?></td>
                                    <td><?php echo $row['mother_name']?></td>
                                    <td><?php echo $row['address']?></td>
                                    <td><?php echo $row['dob']?></td>
                                    <td><?php echo $row['gender']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['contact_number']?></td>
        
                                    <td>
                                    <!-- <a href="edit_user_info.php?update=<?php echo $row['User_id']?>">Approve</a> -->
                                    <form action="" method="post">
                                      <button  type="submit" name="add" class="btn btn-primary">Approve</button>
                                    </form>
                                    
                                    </td>
                                    <td>
                                      <a href="admisstion.php?ID=<?php echo $row['id']?>"  name="btn_delete"  type="submit" name="edit" class="btn btn-danger">Deny</a>
                                    </td>
                                </tr>
                                <?php
                                    $sn++;  
                                }
                            } 
                          

                            if (isset($_POST['add'])) {

                              $name=$row1['full_name'];
                              $address=$row1['address'];
                              $email=$row1['email'];
                              $gender=$row1['gender'];
                              $dob=$row1['dob'];
                              $mobile_num=$row1['contact_number'];
                              $filename=$row1['picture'];
                  


                              $pass="123";
                              $hash=md5($pass);
                              $sql="INSERT INTO `users` (`Full_name`, `Address`, `Email`, `Gender`,`dob`,`Contact_number`,`Profile_pic`,`Password`,`Role_id`) VALUES ('".$name."', '".$address."', '".$email."','".$gender."','".$dob."','".$mobile_num."','".$filename."','".$hash."',1);";

                              $result= mysqli_query($conn,$sql);
                              if ($result) {
                                
                                echo '<div class="alert alert-danger" role="alert">Data Deleted Succesfully!</div>';
                                // header("URL=./teachers.php");
                                 
                                 header("Refresh: 1;");
                              }

                              else{
                                  echo"Someting worng";
                              }
                            }
                          

                            if (isset($_GET['ID'])) {
                              $delete_sql="DELETE FROM admission WHERE id={$_GET['ID']}";
                              $result_1=mysqli_query($conn,$delete_sql);
                      
                              if ($result_1) {
                                  echo'<div class="alert alert-success" role="alert">
                                  Data deleted successfully!
                                </div>';
                      
                                  header("Refresh: 1;");
                                  
                              }
                          }
                      ?>

                    </tbody>

                  </table>
                </div>
              </div>

</section>
    <!-- /.content -->
  </div>

<?php

include('./include/admin_footer.php');

?>