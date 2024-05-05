<?php
include('../include/db.php');
$a= $_POST['student_id'];

    $delete_sql="DELETE FROM users WHERE User_id={$a}";
    $result_1=mysqli_query($conn,$delete_sql);

    if ($result_1) {
        echo'<div class="alert alert-success" role="alert">
        Data deleted successfully!
      </div>';

        header("Location:students.php");
        
    }
?>