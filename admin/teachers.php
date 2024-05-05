<?php
ob_start();
$page='admin_teachers';
include('../include/db.php');
include('./include/admin_header.php');
include('../include/func.inc.php');

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="my-3">Total Teachers</h1>
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

          <?php
            if (isset($_POST['TH_submit'])) {
              $name=validation($_POST["name"]);
              $address=validation($_POST["address"]);
              $email=validation($_POST["email"]);
              $mobile_num=validation($_POST["number"]);
              $gender=validation($_POST["gender"]);
              $date=validation($_POST["dob"]);
              $pass="12";

              if (!$_FILES["profile_pic"]['error']) {
                $filename = $_FILES["profile_pic"]["name"];
                $tempname = $_FILES["profile_pic"]["tmp_name"];	
                $filename=$email.$filename;
              }
              else{     
                $filename="profile.jpg";
                $tempname='';
              }

              if ($name=='' ||$address=='' || $email==''|| $mobile_num==''|| $gender==''|| $date=='') {
                echo '<div class="alert alert-danger" role="alert">Please fill all the fields!</div>';
             }
             else{

              $check="SELECT * FROM `Users` WHERE Email='".$email."'";
     
              $a=mysqli_query($conn,$check);
                  if (mysqli_num_rows($a)==1) {
                    echo '<div class="alert alert-danger" role="alert">Email id already in use!</div>';
                }
                else{
                  $sql="INSERT INTO `users` (`Full_name`, `Address`, `Email`, `Gender`,`dob`,`Contact_number`,`Profile_pic`,`Password`,`Role_id`) VALUES ('".$name."', '".$address."', '".$email."','".$gender."','".$date."','".$mobile_num."','".$filename."','".$pass."',2);";

                  $result= mysqli_query($conn,$sql);
                  if ($result) {
                    move_uploaded_file($tempname,"../assets/img/Profile_pic/"."$filename");
                    echo '<div class="alert alert-success" role="alert">Data Inserted Succesfully!</div>';
                    // header("URL=./teachers.php");
                      // Refresh: 1;
                  }

                  else{
                      echo"Someting worng";
                  }
                }
               
             }
              
              

              
            }
          ?>


            <!-- TABLE -->
            <div class="card">
              <div class="card-header border-transparent">

                <h1 class="card-title text-center"><strong class="text-primary display-4">All Teachers</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body py-2">
                <div class="table-responsive table-student">
                  <table class="table m-0">

                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email Address</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Date of birth</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                        $sql = "SELECT * FROM  users where Role_id=2";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                              $sn=1;
                                while($row = mysqli_fetch_array($result)){
                                  ?>

                                    <tr>
                                    <td><?php echo $sn?></td>
                                    <td><img src="../assets/img/Profile_pic/<?php echo $row['Profile_pic']?>" style="width: 100px;height: 100px;"></td>
                                    <td><?php echo $row['Full_name']?></td> 
                                    <td style="width:20%"><?php echo $row['Address']?></td>
                                    <td><?php echo $row['Email']?></td>
                                    <td style="width:15%"><?php echo "0".$row['Contact_number']?></td>
                                    <td><?php echo $row['Gender']?></td>
                                    <td><?php echo $row['dob']?></td>
        
                                    <td>
                                    <a href="edit_user_info.php?update=<?php echo $row['User_id']?>"  type="submit" name="edit" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                      <a href="teachers.php?userID=<?php echo $row['User_id']?>"  name="btn_delete"  type="submit" name="edit" class="btn btn-danger">Delete</a>
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
                          

                            if (isset($_GET['userID'])) {
                              $delete_sql="DELETE FROM users WHERE User_id={$_GET['userID']}";
                              $result_1=mysqli_query($conn,$delete_sql);
                      
                              if ($result_1) {
                                  echo'<div class="alert alert-success" role="alert">
                                  Data deleted successfully!
                                </div>';
                      
                                  header("Refresh: 1; URL=teachers.php");
                                  
                              }
                          }
                      ?>

                    </tbody>

                  </table>
                </div>
              </div>
<!-- Modal -->

     <div class="card-footer clearfix">
                <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">Add</a>
              </div>

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                            <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enter Name:</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Number</label>
                                    <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gender</label>
                                    
                                      <div class="">
                                        <input  type="radio" name="gender" value="Male" checked>Male
                                        <input class="ml-3" type="radio" name="gender" value="Female" >Female
                                      </div>      
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Upload Your Profile Picture:</label>
                                    <input type="file" name="profile_pic" class="form-control" id="exampleInputPassword1">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of birth:</label>
                                    <input type="date" name="dob" class="form-control" id="exampleInputPassword1">
                                </div>

                            
                            </div>

                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="TH_submit" class="btn btn-primary">Save</button>
                            </div>

                            

                          </form>
                        </div>
                    </div>
                </div>

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<script>
  function check(){
    return confirm("Are You Sure you want to delete this data?");
  }
</script>
<?php

include('./include/admin_footer.php');

?>