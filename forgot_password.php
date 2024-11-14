<?php
    include('header.php');
?>
<?php
$email = "";
$errors = array();

// If user clicks continue button in forgot password form
//if user click continue button in forgot password form
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM user_account WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE user_account SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: thenewsnest02@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}
?>

<div class="container">
    <div class="form">
        <h1>Forgot Password</h1>
        <form action="forgot_password.php" method="post">
        <?php
                        if(count($errors) > 0){
                            foreach($errors as $error){
                                echo '<div class="alert alert-danger text-center">' . $error . '</div>';
                            }
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control input" type="email" name="email" placeholder="Enter your registered email" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
        </form>
    </div>
</div>


<?php
    include('sub_footer.php');
?>

<style>
    
    body {
  background: url(Assets/image/pexels-jessbaileydesign-743986.jpg);
  background-size: cover;
  background-position: center;
}
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 83.5vh;
    }
    .form{
        background: transparent;
        border: solid;
        border-width: 1px;
        width: 40%;
        text-align: center;
        padding:50px;
        padding-top: 20px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        
  /* box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); */

    }
    .form h1{
        margin-bottom:40px;
    }

    .form-control{
        margin-bottom:20px;
        font-size:20px;
        
    }

    .input{
        background-color:lightgrey;
        height:50px;
    }

    .button{
        border-radius:25px;
        font-size: 25px;
    }

    .button:hover{
        background-color: grey;
    }
</style>
