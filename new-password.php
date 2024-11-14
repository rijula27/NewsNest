<?php
    include('header.php');
?>

<?php
$email = "";
$name = "";
$errors = array();
//if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        // $encpass = password_hash($password, PASSWORD_BCRYPT);
        $encpass = hash('sha256',$password);
        $update_pass = "UPDATE user_account SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<div class="container">
<form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change Password">
                    </div>
                </form>
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