<?php
$page='admin_home';
include('../include/db.php');
include('./include/admin_header.php');
include('../include/func.inc.php');



if (isset($_GET['userID'])) {
  $delete_sql="DELETE FROM users WHERE User_id={$_GET['userID']}";
  $result_1=mysqli_query($conn,$delete_sql);

  if ($result_1) {
      echo'<div class="alert alert-success" role="alert">
      Data deleted successfully!
    </div>';

      header("Location: a.php");
      
  }
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="my-3">Welcome To Dashboard <i><?php echo $_SESSION['UserName'];?></i> </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">
                  10
                
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Teachers</span>
                <span class="info-box-number">410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Courses</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Visitors</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


 

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">


            <!-- TABLE -->
            <div class="card">
              <div class="card-header border-transparent">
                <h1 class="card-title"><strong class="text-primary">Students</strong></h1>

                <div class="card-footer clearfix">
                <button class="aa btn btn-sm btn-secondary float-right">Print</button>
              </div>
              </div>

              <script type="text/javascript">
                function print(paravalue){
                  // var backup =document.body.innerHTML;
                  // var div =document.getElementById(paravalue).innerHTML;
                  // document.body.innerHTML = div;
                  window.print();
                }

                
                
              </script>

              <!-- /.card-header -->
              <div class="card-body py-2">
                <div class="table-responsive">
                  <!-- Student Table -->
                  <table class="table m-0 table-hover" id="std">
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
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM  users where Role_id=1";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                              $sn=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo'
                                    <tr>
                                    <td>'.$sn.'</td>
                                    <td><img src="../assets/img/Profile_pic/'.$row['Profile_pic'].'" style="width: 50px;height: 50px;"></td>
                                    <td>'.$row['Full_name'].'</td> 
                                    <td style="width:20%">'.$row['Address'].'</td>
                                    <td>'.$row['Email'].'</td>
                                    <td style="width:15%">'."0".$row['Contact_number'].'</td>
                                    <td>'.$row['Gender'].'</td>
                                    <td>'.$row['dob'].'</td>
        
                                    <td>
                                    <a href="edit_user_info.php?update='.$row['User_id'].'"  type="submit" name="edit" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                    ';
                                    $sn++;
                                   
                                }
                            } 
                          }
                            else{
                                echo "No records matching your query were found.";
                            }
                      ?>
                                          
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="./students.php" class="btn btn-sm btn-secondary float-right">View All</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-transparent">
              <h1 class="card-title"><strong class="text-primary">Teachers</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body py-2">
                <div class="table-responsive">
                  <!-- Teachers Table -->
                <table class="table m-0 table-hover">
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
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM  users where Role_id=2";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                              $sn=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo'
                                    <tr>
                                    <td>'.$sn.'</td>
                                    <td><img src="../assets/img/Profile_pic/'.$row['Profile_pic'].'" style="width: 50px;height: 50px;"></td>
                                    <td>'.$row['Full_name'].'</td> 
                                    <td style="width:20%">'.$row['Address'].'</td>
                                    <td>'.$row['Email'].'</td>
                                    <td style="width:15%">'."0".$row['Contact_number'].'</td>
                                    <td>'.$row['Gender'].'</td>
                                    <td>'.$row['dob'].'</td>
        
                                    <td>
                                    <a href="edit_user_info.php?update='.$row['User_id'].'"  type="submit" name="edit" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                    ';
                                    $sn++;
                                   
                                }
                            } 
                          }
                            else{
                                echo "No records matching your query were found.";
                            }
                      
                           
                      ?>
                                          
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="./teachers.php" class="btn btn-sm btn-secondary float-right">View All</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>





<?php
include('./include/admin_footer.php');

?>