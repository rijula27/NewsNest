

     <!-- PHP file -->
<?php

session_start();
// Check if the POST variables are set
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['accountType'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $accountType = $_POST['accountType'];  // assuming this is a radio button, so it should be either "user" or "admin"

    //hashed the password
    $hashed_password = hash('sha256',$password);

    //database connection
    $con = new mysqli("localhost","root","","news_portal");

    if($con->connect_error) {
        die("Failed to connect : ".$con->connect_error);
    } elseif ($accountType == 'user'){
        $stmt= $con->prepare ("SELECT * FROM user_account WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();


            //Compare Hashed password 
            if($data['password'] === $hashed_password){
                    //For user login
                    // header("Location: dashboard_article.php?");
                    $stmt = $con->prepare("SELECT user_id, user_name,img FROM user_account WHERE  email = ?");
                    $stmt->bind_param("s",$email);
                    $stmt->execute();
                    $check_result = $stmt->get_result();
                    $row = $check_result->fetch_assoc();
                    $userId = $row['user_id'];
                    $userName = $row['user_name'];
                    $img = $row['img'];

                    $_SESSION['user_name'] = $userName;
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['img'] = $img;
                    header("Location: dashboard_add_article.php?email=".urlencode($email)."&userId=" . urlencode($userId) ."&message=".urlencode($userName));
                    exit();
                
                // echo "<h2>Login succesfully</h2>";
                
                // exit();

            }else{
                // echo "<h2> Invalid password or Invalid Account Type</h2>";
                header("Location: login.php?message=" . urlencode("Invalid password or Invalid Account Type"));
                exit();
            }
        
        }else{
            // echo "<h2>Invalid credential</h2>";
            header("Location: login.php?message=" . urlencode("Invalid credential"));
            exit();
        }
    }else{
            
        $stmt= $con->prepare ("SELECT * FROM admin_account2 WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();


            //Compare Hashed password 
            if($data['password'] === $hashed_password){
            // For admin login
            $stmt = $con->prepare("SELECT admin_id, admin_name, img FROM admin_account2 WHERE  email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $check_result = $stmt->get_result();
            $row = $check_result->fetch_assoc();
            $userId = $row['admin_id'];
            $userName = $row['admin_name'];
            $img = $row['img'];

            $_SESSION['admin_name'] = $userName;
            $_SESSION['admin_id'] = $userId;
            $_SESSION['img'] = $img;
            header("Location: admin_dashboard_userView.php?email=".urlencode($email)."&userId=" . urlencode($userId) ."&message=".urlencode($userName));
            exit();
            }else{
                // echo "<h2> Invalid password or Invalid Account Type</h2>";
                header("Location: login.php?message=" . urlencode("Invalid password or Invalid Account Type"));
                exit();
            }
        }else{
            // echo "<h2>Invalid credential</h2>";
            header("Location: login.php?message=" . urlencode("Invalid credential"));
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/style/login.css">
    <script src="https://kit.fontawesome.com/3d8df9be04.js" crossorigin="anonymous"></script>
</head>
<body>


<!-- php file -->

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "news_portal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }


    if (isset($_GET['register'])){
        header("Location:register.php");
        exit;
    }


    // if(isset($_GET[ 'dashboard' ])) { 
    //     header("Location:dashboard.html");
    //     exit;
    // }

    // if (isset($_GET['signup'])){
    //     header("Location:/The News Nest Project/Sign Up page/signup.html");
    //     exit;
    // }

    
    // $message = isset($_GET[ 'message' ]) ? $_GET[ 'message']:"Default success message";

    // echo $message;
    ?>




    <!-- Nav bar -->
    <div class="mnavbar flex">
        <div>
            <img src="Assets/image/logo.png" alt="">
        </div>

        <div>
            <ul class="flex msub_navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="article.php">Article</a></li>
                <li class="dropdown"> <!-- Add the class "dropdown" to create a dropdown -->
                    <a href="#" class="dropbtn">Categories</a>
                    <div class="dropdown-content"> <!-- Add dropdown content here -->
                        <a href="inr_news.php#international">International</a>
                        <a href="inr_news.php#national">National</a>
                        <a href="inr_news.php#regional">Regional</a>
                        <a href="category.php#technology">Technology</a>
                        <a href="category.php#business">Business</a>
                        <a href="category.php#sports">Sports</a>
                        <a href="category.php#other">Other</a>
                    </div>
                </li>
                <li class="dropdown"> <!-- Add the class "dropdown" to create a dropdown -->
                    <a href="#" class="dropbtn">Language</a>
                    <div class="dropdown-content"> <!-- Add dropdown content here -->
                        <a href="english_news.php">English</a>
                        <a href="hindi_news.php">हिंदी</a>
                        <a href="assamese_news.php">অসমীয়া</a>
                    </div>
                </li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="cc_button">
            <a class="a ah" href="login.php?register"><button>Create Account</button></a>
        </div>
    </div>

    <style>
        /* Define CSS styles for the success message */
        #message {
        padding: 20px;
    color: #0000ff;
    margin: 20px auto 0;
    max-width: 600px;
    text-align: center;
    opacity: 1;
            transition: opacity 1s ease-out;
    }
    </style>


    <div id="message">
        <?php
        // Retrieve the message from the URL parameter
        $message = isset($_GET['message']) ? $_GET['message'] : "";

        // Output the message within a <p> tag
        echo '<h2>' . htmlspecialchars($message) . '</h2>';
        ?>
    </div>
    <script>
        // Function to hide the message
        function hideMessage() {
            var messageDiv = document.getElementById('message');
            messageDiv.style.opacity = '0';
        }

        // Hide the message after 5 seconds (5000 milliseconds)
        setTimeout(hideMessage, 3000);
    </script>

    <div class="container flex">
        <div class="form-box">
            <h1 id="title">Log In</h1>
            <form action="" method="post" id="signupForm">
                <div class="input-group">
                    <div class="input-field">
                        <label class="input" for="choose account type">Choose account Type</label>
                        <select class="input_option" id="" name="accountType">
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" id="" name="email" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" id="" name="password" required>
                    </div>

                    <p>Forgot Password <a href="forgot_password.php">Click here</a></p>
                </div>

                <div class="btn-field">
                    <button type="submit" id="signupBtn">Log In</button>
                </div>
                <div class="Log_in_register">
                    <p>New user? <a href="Register.php">Register</a></p>
                </div>
                
            </form>
        </div>
        
    </div>

    <!-- Footer -->
    <div class="flex sub_footer">
        <div class="copyright">
            <p class="">@Copyright The New Nest. All Rights Reserved</p>
        </div>
        <div class="sociallogo">
        <a href="https://mail.google.com/mail/u/0/#inbox" class="footer_icon"><i class="fa-regular fa-envelope"></i></a>
                <a href="https://www.instagram.com/" class="footer_icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/" class="footer_icon"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://x.com/" class="footer_icon"><i class="fa-brands fa-square-x-twitter"></i></a>
        </div>
    </div>

</body>
<style>
            .footer_icon{
                color: Black;
                font-size: 25px;
                margin: 10px;
            }

            </style>
</html>



    