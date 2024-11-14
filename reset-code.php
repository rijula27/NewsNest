<?php
    include('header.php');
?>

<?php
$email = "";
$name = "";
$errors = array();

//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM user_account WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
?>

<div class="container">
    <div class="form">
        <h1>Code Verification</h1>
        <form action="reset-code.php" method="post">
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
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
                        <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
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
