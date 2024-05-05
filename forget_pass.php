<?php
$page="portal";
include("./include/header.inc.php");
include("./include/db.php");
include("./include/func.inc.php");




?>
    <main>   
        <section class="flex align_center justify_center _pg_head portal_head">
            <h1>Forget Password</h1>
            <span></span>
        </section>
        
        <section>
            <div class="container">
                <div class="portal_form">
                    <div class="portal_form_head">
                        <h1>Forget Your Password?</h1>
                        <hr>                    
                    </div>
                    
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php
                    

                    if (isset($_POST['submit'])) {
                        

                        $email=validation($_POST['email']) ;
                        $password=validation($_POST['password']);
                        $cpassword=validation($_POST['cpassword']);



                        if (empty($email)||empty($password)||empty($cpassword)) {
                            echo'<div class="danger">Input fields cannot be empty!</div>';
                        }
                        
                        else{

                            if ($password==$cpassword) {
                                
                                $email=validation($email) ;
                                $password=validation($password);
                                $hash=md5($password);
                                // UPDATE Customers
                                // SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                                // WHERE CustomerID = 1;

                                 $sql="UPDATE `users` SET Password = '".$hash."' where Email='".$email."'";
                                
                                $result= mysqli_query($conn,$sql);
                                
                                if ($result) {
                                    echo'<div class="success">Password changed successfully!!</div>';
                                    
                                    header("Refresh: 1; url=portal.php");
                        
                                }
                                else{
                                    echo'<div class="danger">Somthing Went worng!</div>';
                                }
                            }
                            else{
                                echo"<div class='danger'>Password did't match</div>";
                            }

                            
                        }

                        

                        

                    }



                    ?>
                        <div class="input_box">
                            <label for="">Email</label> <br>
                            <input type="email" name="email">
                        </div>
                        <div class="input_box">
                            <label for="">New Password</label> <br>
                            <input type="password" name="password">
                        </div>
                        <div class="input_box">
                            <label for="">Re-write password</label> <br>
                            <input type="password" name="cpassword">
                        </div>
                        
                        <button class="btn" type="submit" name="submit">Log In</button>
                        
                    </form>
                    <a class="popup_link" href="./portal.php">Login Now!!</a>
                </div>
                
            </div>
        </section>
    </main>

<?php
$a="home";
include("./include/footer.inc.php");
?>