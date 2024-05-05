<?php
ob_start();
$page='messages';
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
            <h1 class="my-3">All Messages</h1>
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

                <h1 class="card-title text-center"><strong class="text-primary display-4">All Messages</strong></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body py-2">
                <div class="table-responsive table-student">
                  <table class="table m-0">

                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Messages</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                        $query  = "SELECT * FROM  conatact_us";
                        $result   = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                              $sn=1;
                                while($row = mysqli_fetch_array($result)){
                                  ?>

                                    <tr>
                                        <td><?php echo $sn?></td>
                                        <td><?php echo $row['Full_name']?></td> 
                                        <td ><?php echo $row['Email']?></td>
                                        <td><?php echo $row['Messages']?></td>  
                                    </tr>
                                <?php
                                    $sn++;  
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