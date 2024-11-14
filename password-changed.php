<?php
  include('header.php');
?>
<?php
$email = "";
$name = "";
$errors = array();


if(isset($_POST['login-now'])){
    header('Location: login-user.php');
}

?>
<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<div class="container">
        <div class="row">
            <div class="login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
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
    
    /* .row{
        border: solid;
    }
    .login-form{
        border:solid;
        width: 90%;
    } */

    .button{
        height:50px;
        font-size:25px;
    }
    .button:hover{
        background-color: grey;
    }
</style>