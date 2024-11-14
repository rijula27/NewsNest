<?php

session_start();

    include("dbconnection.php");

    //$userId = isset($_GET['userId']) ? $_GET['userId'] : "";

    // $sql = "SELECT * FROM article WHERE user_id3 = $userId";
    // $all_product = $conn->query($sql);

    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';


    $stmt = $conn->prepare("SELECT * FROM article WHERE user_id3 = ?");
    $stmt->bind_param("i",$userId);
    $stmt->execute();
    $article_details = $stmt->get_result();

//     $message = isset($_GET['message']) ? $_GET['message'] : "";
// $userId = isset($_GET['userId']) ? $_GET['userId'] : "";
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] :'';
$img = isset($_SESSION['img']) ? $_SESSION['img'] :'';


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" contents="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Assets/style/dashboard.css">
        <script src="https://kit.fontawesome.com/3d8df9be04.js" crossorigin="anonymous"></script>
        <title>Admin Panel</title>
    </head>
    <body>

    <?php
// Retrieve the message from the URL parameter
//$message = isset($_GET['message']) ? $_GET['message'] : "";
    ?>
        <div class="side-menu">
        <div>
            <h3 class="dashboard-heading underline">Dashboard</h3>
            
            <ul>
                <div>
                <li><span><a href="dashboard_add_article.php"><i class="fa-solid fa-pen-to-square"></i> Add Article</a></span></li><hr class="hr">
                <li><span><a  href="dashboard_add_news.php"><i class="fa-solid fa-square-pen"></i> Add News</a></span></li><hr class="hr">
                <li class="select_tab"><span><a href=""><i class="fa-solid fa-book-open"></i> View Article</a></span></li><hr class="hr">
                <li><span><a href="dashboard_view_news.php"><i class="fa-regular fa-newspaper"></i> View News</a></span></li><hr class="hr">
                <li><span><a href="contact.php"><i class="fa-solid fa-comment"></i>Help</a></span></li>
                </div>
                <style>
                    .side-menu li span {
  font-weight: 100;
}
                </style>
                <div>
                <div class="flex">
                    <!-- <li><a href="" class="logout_button">Change Password</a></li> -->
                <li class="hoveroff" style="background-color: #cdc8c800;"><a href="logout.php" class="logout_button"><button>Logout</button></a></li>
            </div>
            </div>
            </ul>
        </div>
        </div>
        <div class="container">
            <div class="header">
                <div class="nav">
                    <div class="user">
                        <div class="brand-name">
                            <a href="index.php"><img src="logo.png" alt=""></a>
                        </div>
                        <div class="user user-profile">
                           <?php
                               echo '<a href="#" class="user_name">' . htmlspecialchars($userName) . '</a>';
                           ?>
                            <div class="img-case">
                               <!-- <a href=""><img src="Kaustav dp.jpg" alt="img"></a> -->
                               <a href = ""><img src="Assets/image/<?php echo $img; ?>" alt=""></a>

                            </div>
                        </div>

                    </div>    
                </div> 
            </div>  
            <div class="content">
                <div class="conten_heading">
                    <h1 class="underline">My Article</h1>
                </div>
            <div class="actual-content">
                <?php
                            while($row = mysqli_fetch_assoc($article_details)){
                                ?>

                                
                <div class="card">
                <a href="article.php#<?php echo $row["title"]; ?>">
                    <div class="image">
                    <img src="Assets/image/<?php echo $row['image1']; ?>" alt="i">
                    </div>
                    <p class="caption"><?php echo $row["title"]; ?></p>
                    <!-- <p class="caption"> Checking the network cables, modem, and router
                        Reconnecting to Wi-Fi
                        Running Windows Network Diagnostics Checking the network cables, modem, and router
                        Reconnecting to Wi-Fi
                        Running Windows Network Diagnostics Reconnecting to Wi-Fi
                        Running Windows Network Diagnostics</p> -->
                    <p class="date">Date - <?php echo $row["published_date"]; ?></p>
                    </a>
                </div>
                <?php } ?>
                </div>
            </div>    
    </body>


    <style>

.content{
            background: white;
        }

        .conten_heading{
            margin: 35px  auto 10px 80px;
        }




        .actual-content{
            max-width:1100px;
            width:95%;
            /* margin: 30px auto; */
            margin: 70px auto auto 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;

        }




       .card{
        max-width: 350px;
        flex: 1 1 310px;
        text-align: center;
        height: 320px;
        border-width: 1px;
        margin: 20px;
        overflow:hidden;
        /* box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); */
       }

       .image{
        height: 75%;
        margin-buttom: 20px;
       }

       .image img{
        width: 100%;
        height: 100%;
        object-fit: cover;

       }

       .caption{
        /* padding-left: 1em; */
        margin-top:7px;
        text-align: left;
        /* line-height: 3em; */
        height: 15%;
        overflow:hidden;
        font-size: 1.25rem;
        font-weight:600;
       }

       /* .caption p{
        font-size: 2.5rem;
       } */

       .date{
        text-align: left;
        font-weight:700;
       }
    </style>
    
</html>




<!-- <div class="flex actual_content ">
                     <div class="flex"> -->
                        <!-- <?php
                            while($row = mysqli_fetch_assoc($all_product)){
                                ?>
        
                                <div class="box">
                                    <a href="">
                                    <img src="Assets/image/<?php echo $row['image']; ?>" alt="i">
                                    <p><?php echo $row["image_id"]; ?></p>
                                    </a>
                                </div>
        
                                <?php
                                    }
                                ?> -->
                                <!-- <div class="box">
                                    <a>
                                    <img src="" alt="i">
                                    <p>p</p>
                                </a>
                                </div>
                                <div class="box">
                                    <a href="">
                                    <img src="" alt="i">
                                    <p>p</p>
                                </a>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="box">
                                    <a href="">
                                    <img src="" alt="i">
                                    <p>p</p>
                                    </a>
                                </div>
                                <div class="box">
                                    <a>
                                    <img src="" alt="i">
                                    <p>p</p>
                                </a>
                                </div>
                                <div class="box">
                                    <a href="">
                                    <img src="" alt="i">
                                    <p>p</p>
                                </a>
                                </div>
                            </div> 
                        </div> -->

<!-- 
                        /* .content{
            background: white;
        }

        

        .actual_content{
            border: solid;
            width: 90%;
            margin: 30px auto auto 70px;
        }

        .box{
            border: solid;
            width: 31%;
            height: 250px;
        }

        .box img{
            border: solid;
            display: block;
            width: 100%;
            height: 85%;
        }

        .box p{
            border: solid;
            width: 100%;
            height: 15%;
        } */ -->