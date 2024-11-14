<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/style/style.css">
    <link rel="stylesheet" href="mediaquery.css">
    <script src="https://kit.fontawesome.com/3d8df9be04.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <style>
        .mnavbar {
            position: fixed; /* Set position to fixed */
            top: 0; /* Position at the top of the page */
            width: 100%; /* Take up full width of the viewport */
            z-index: 1000; /* Set z-index higher to make sure it's on top of other content */
            background-color: #f2f2f2dd; /* Optional: Add background color */
            box-shadow: 0 2px 14px rgba(0,0,0,0.1); /* Optional: Add shadow */
        }
        .content {
            margin-top: 125px; /* Adjust margin top to accommodate the fixed navbar */
        }
        
        body {
            overflow-x: hidden;
        }

    </style>
</head>
<body>

<!-- php file -->

 <?php
    include('dbconnection.php');


    if (isset($_GET['login'])){
        header("Location:login.php");
        exit;
    }

    if(isset($_GET["admin_dashboard"])){
        header("Location:admin_dashboard_userView.php");
        exit;
    }

    if(isset($_GET["user_dashboard"])){
        header("Location:dashboard_add_article.php");
        exit;
    }


    // if (isset($_GET['signup'])){
    //     header("Location:/The News Nest Project/Sign Up page/signup.html");
    //     exit;
    // }
    ?>








<!-- html file -->


<!-- NAVIGATION BAR SECTION -->
    <div class="mnavbar flex">
        <div>
            <img src="Assets/image/logo.png" alt="">
        </div>

        <div>
            <ul  class="flex msub_navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="article.php">Article</a></li>
                <li class="dropdown"> <!-- Add the class "dropdown" to create a dropdown -->
                    <a href="#" class="dropbtn">Categories <i class="fa-solid fa-angle-down"></i></a>
                    <div class="dropdown-content"> <!-- Add dropdown content here -->
                        <a href="inr_news.php#international">International</a>
                        <a href="inr_news.php#national">National</a>
                        <a href="inr_news.php#regional">Regional</a>
                        <a href="category_news.php#technology">Technology</a>
                        <a href="category_news.php#business">Business</a>
                        <a href="category_news.php#sports">Sports</a>
                    </div>
                </li>
                <li class="dropdown"> <!-- Add the class "dropdown" to create a dropdown -->
                    <a href="#" class="dropbtn">Language <i class="fa-solid fa-angle-down"></i></a>
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
            <!-- <a class="a" href="index.php?login"><button>Create Content</button></a> -->
            <?php
            session_start();
            if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == true){
                echo  '<a class="a" href="index.php?admin_dashboard"><button>Create Content</button></a>';
            }elseif(isset($_SESSION['user_id']) && $_SESSION['user_id'] == true){
                echo  '<a class="a" href="index.php?user_dashboard"><button>Create Content</button></a>';
            }else{
                echo  '<a class="a" href="index.php?login"><button>Login</button></a>';
            }
            ?>
        </div>
    </div>