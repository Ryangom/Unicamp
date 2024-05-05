<?php


function validation($data)
{   include("db.php");

    $data=trim($data);
    $data=mysqli_real_escape_string($conn,$data);
    $data=htmlspecialchars($data);
    $data=stripcslashes($data);
    return $data;
}

