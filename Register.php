<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['accountType'])) {
    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'news_portal');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {

        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $accountType = $_POST['accountType'];
        $req_date = date('Y-m-d');

        $img_name = $_FILES['img_upload']['name'];
        $tmp_img_name = $_FILES['img_upload']['tmp_name'];
        $folder = 'Assets/image/' . $img_name;

        //check if passwords match or not
        if ($password !== $confirmPassword) {
            die('Passwords do not match. Please try again.');
        }

        //check if email already exist
        $check_stmt = $conn->prepare('SELECT user_id, user_name,email FROM user_account WHERE email = ? UNION SELECT admin_id, admin_name, email FROM admin_account2 WHERE email = ?');
        $check_stmt->bind_param('ss', $email, $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();


        if ($check_result->num_rows > 0) {
            echo 'Email already exists. Please use a different email address.';
        } else {

            //check if account type is admin
            if ($accountType === 'admin') {
                $keyCode = $_POST['keyCode'];
                $adminKeyCode = 'TheNewsNest@admin';

                if ($keyCode !== $adminKeyCode) {
                    die('Invalid Key Code. Only authorized individuals can create an Admin Account.');
                }
            }

            //Hash the password

            // Prepare and execute the query
            $stmt = $conn->prepare('insert into registration_form(account_Type,user_name,email,req_date, password,img) values(?,?,?,?,?,?)');
            $stmt->bind_param('ssssss', $accountType, $name, $email, $req_date, $password, $img_name);

            // $stmt->execute();
            if ($stmt->execute()) {
                if (move_uploaded_file($tmp_img_name, $folder)) {
                    // header('Location: dashboard_add_article.php');
                    header('Location: login.php?message=Account%20registration%20is%20successfull%20please%20wait%20for%20approval.');

                }
            } else {
                echo "Error: " . $stmt4->error;
            }
            //  echo 'Data Inserted Successfully';
            $stmt->close();

            //Redirect to  another page
            header('Location: login.php?message=Account%20registration%20is%20successfull%20please%20wait%20for%20approval.');
            exit();
        }

        $check_stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='Assets/style/login.css'>
    <script src='https://kit.fontawesome.com/3d8df9be04.js' crossorigin='anonymous'></script>
</head>

<body>
    <!-- Navbar -->

    <div class='mnavbar flex'>
        <div>
            <img src='Assets/image/logo.png' alt=''>
        </div>

        <div>
            <ul class='flex msub_navbar'>
                <li><a href='index.php'>Home</a></li>
                <li><a href='article.php'>Article</a></li>
                <li class='dropdown'> <!-- Add the class 'dropdown' to create a dropdown -->
                    <a href='#' class='dropbtn'>Categories</a>
                    <div class='dropdown-content'> <!-- Add dropdown content here -->
                        <a href='inr_news.php#international'>International</a>
                        <a href='inr_news.php#national'>National</a>
                        <a href='inr_news.php#regional'>Regional</a>
                        <a href='category.php#technology'>Technology</a>
                        <a href='category.php#business'>Business</a>
                        <a href='category.php#sports'>Sports</a>
                        <a href='category.php#others'>Others</a>
                    </div>
                </li>
                <li class='dropdown'> <!-- Add the class 'dropdown' to create a dropdown -->
                    <a href='#' class='dropbtn'>Language</a>
                    <div class='dropdown-content'> <!-- Add dropdown content here -->
                        <a href='english_news.php'>English</a>
                        <a href='hindi_news.php'>हिंदी</a>
                        <a href='assamese_news.php'>অসমীয়া</a>
                    </div>
                </li>
                <li><a href='about.php'>About</a></li>
                <li><a href='contact.php'>Contact Us</a></li>
            </ul>
        </div>

        <div class='cc_button'>
            <a class='a ah' href='login.php'><button>Log in</button></a>
        </div>
    </div>

    <!-- Signup Form -->

    <div class='container'>
        <div class='form-box'>
            <h1 id='title'>Register</h1>
            <form action='' method='post' id='signupForm' enctype="multipart/form-data">
                <div class='input-group'>
                    <div class='input-field'>
                        <label class='input' for='choose account Type'>Choose account Type</label>
                        <select class='input_option' id='' name='accountType'>
                            <option value='admin'>Admin</option>
                            <option value='user'>User</option>
                        </select>
                    </div>
                    <div class='input-field' id='nameField'>
                        <i class='fa-solid fa-user'></i>
                        <input type='text' placeholder='Name' id='' name='name' required>
                    </div>

                    <div class='input-field'>
                        <i class='fa-solid fa-envelope'></i>
                        <input type='email' placeholder='Email' id='' name='email' required>
                    </div>

                    <div class='input-field'>
                        <i class='fa-solid fa-lock'></i>
                        <input type='password' placeholder='Password' id='' name='password' required>
                    </div>

                    <div class='input-field'>
                        <i class='fa-solid fa-lock'></i>
                        <input type='password' placeholder='Confirm Password' id='' name='confirmPassword'>
                    </div>

                    <div class='input-field'>
                        <i class='fa-solid fa-lock'></i>
                        <label for='imageUpload'></label>
                        <!-- Image Upload:<br> -->
                        <input type='file' accept='.jpg, .jpeg, .png, /.gif' placeholder='Image Upload' id='' name='img_upload' required>
                    </div>

                    <div class='input-field'>
                        <i class='fa-thin fa-key'></i>
                        <input type='password' placeholder='Admin Key' id='' name='keyCode'>
                    </div>

                </div>

                <div class='btn-field'>
                    <button type='submit' id='signupBtn'>Create Account</button>
                </div>
                <div class='Log_in_register'>
                    <p>Already Have an Account? <a href='login.php'>Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class='flex sub_footer'>
        <div class='copyright'>
            <p class=''>@Copyright The New Nest. All Rights Reserved</p>
        </div>
        <div class='sociallogo'>
        <a href="https://mail.google.com/mail/u/0/#inbox" class="footer_icon"><i class="fa-regular fa-envelope"></i></a>
                <a href="https://www.instagram.com/" class="footer_icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.facebook.com/" class="footer_icon"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://x.com/" class="footer_icon"><i class="fa-brands fa-square-x-twitter"></i></a>
        </div>
    </div>

    <!--CSS Style -->

    <style>
            .footer_icon{
                color: Black;
                font-size: 25px;
                margin: 10px;
            }

        .input-group {
            height: 430px;
        }
        .form-box {
            top: 55%;
        }
        .sub_footer {
            margin-top: 100px;
        }

        .btn-field{
            margin-top: 90px;
        }

    </style>

</body>
</html>

