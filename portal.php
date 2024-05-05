<?php
$page="portal";
include("./include/header.inc.php");
include("./include/db.php");
include("./include/func.inc.php");
?>
    <main>   
        <section class="flex align_center justify_center _pg_head portal_head">
            <h1>Log In</h1>
            <span></span>
        </section>
        
        <section>
            <div class="container">
                <div class="portal_form">
                    <div class="portal_form_head">
                        <h1>Log in to your account</h1>
                        <hr>                    
                    </div>
                    
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php
                    

                    if (isset($_POST['submit'])) {
                        $email=validation($_POST['email']) ;
                        $password=validation($_POST['password']);

                        if (empty($email)||empty($password)) {
                            echo'<div class="danger">Input fields cannot be empty!</div>';
                        }
                        
                        else{
                             //$hash=md5($password);

                            
                            $email=validation($email) ;
                            $password=validation($password);

                            $hash=md5($password);

                             $sql="SELECT * FROM `users` where Email='$email' and Password ='$hash'";
                            // die();
                            $result= mysqli_query($conn,$sql);
                            
                            if (mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_array($result);
                                $_SESSION['login'] = true;

                                // User Information
                                $_SESSION['UserName'] = $row['Full_name'];
                                $_SESSION['user_id'] = $row['User_id'];
                                $_SESSION['user_email'] = $row['Email'];
                                $_SESSION['user_role'] = $row['Role_id'];
                                $_SESSION['user_profile'] = $row['Profile_pic'];

                                if($row['Role_id']==3){
                                    header("location:./admin/a.php");
                                }else{
                                    header("location:./admin/profile.php");
                                }
                                
                               
                    
                            }
                            else{
                                echo'<div class="danger">Incorrect password or username. Please try again</div>';
                            }
                        }
                    }
                    ?>

                        <div class="input_box">
                            <label for="">Email</label> <br>
                            <input type="email" name="email">
                        </div>
                        <div class="input_box">
                            <label for="">Password</label> <br>
                            <input type="password" name="password">
                        </div>
                        
                        <button class="btn" type="submit" name="submit">Log In</button>
                        
                    </form>
                    <a class="popup_link" href="./forget_pass.php">Forget Password?</a>
                </div>
                
            </div>
        </section>
    </main>
    
<?php
$a="home";
include("./include/footer.inc.php");
?>