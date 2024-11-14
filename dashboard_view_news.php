<?php

session_start();
include('dbconnection.php');

//$userId = isset($_GET['userId']) ? $_GET['userId'] : "";
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';

$stmt_latest = $conn->prepare("SELECT * FROM news WHERE user_id2 = ? ORDER BY news_id DESC");
$stmt_latest->bind_param("i", $userId);
$stmt_latest->execute();
$latest_news_details = $stmt_latest->get_result();



$stmt_remaining = $conn->prepare("SELECT * FROM news WHERE user_id2 = ?");
$stmt_remaining->bind_param("i", $userId);
$stmt_remaining->execute();
$news_details = $stmt_remaining->get_result();

// $message = isset($_GET['message']) ? $_GET['message'] : "";
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

    ?>
    <div class="side-menu">
        <div>
            <h3 class="dashboard-heading underline">Dashboard</h3>
            
            <ul>
                <div>
                <li><span><a href="dashboard_add_article.php"><i class="fa-solid fa-pen-to-square"></i> Add Article</a></span></li><hr class="hr">
                <li><span><a  href="dashboard_add_news.php"><i class="fa-solid fa-square-pen"></i> Add News</a></span></li><hr class="hr">
                <li><span><a href="dashboard_view_article.php"><i class="fa-solid fa-book-open"></i> View Article</a></span></li><hr class="hr">
                <li class="select_tab"><span><a href="index.php"><i class="fa-regular fa-newspaper"></i> View News</a></span></li><hr class="hr">
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
            <div class="header" style="background-color: rgb(206, 211, 211);">
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
                <div>
                    <div class="latest_news">
                       <h1 class="underline">Latest News</h1>

                       <?php
                       $count = 0;
                       while($latestNews = mysqli_fetch_assoc($latest_news_details)){
                        
                        if ($count< 3) {
                       ?>
                       <div class=" flex latest_news1">
                        <div class="news_text">
                            <h2><?php echo $latestNews["title"] ?></h2>
                            <p><?php echo $latestNews["content"] ?></p>
                        </div>
                        <div class="news_image">
                            <img src="Assets/image/<?php echo $latestNews['image1']; ?>" alt="img">
                        </div>
                       </div>
                       <?php

                       $count = $count +1;

                        }
                       }
                       ?>

                    </div>
                    
                    <div class="total_post">
                        <h2 class="underline" style="text-align: center;">Total Post</h2>
                        <?php
                        // Calculate the total number of posts
                        $total_posts = $news_details->num_rows;
                        ?>
                        <h1 style="text-align: center;"><?php echo $total_posts; ?></h1>

                        <?php
                        // Initialize the count variables
                        $international_count = 0;
                        $national_count = 0;
                        $regional_count = 0;

                        // Iterate through the result set
                        while ($row = mysqli_fetch_assoc($news_details)) {
                            // Prepare and execute a query to retrieve the content type
                            $stmt = $conn->prepare("SELECT * FROM content_type WHERE content_type_id = ?");
                            $stmt->bind_param('i', $row['content_type_id']);
                            $stmt->execute();
                            $contentTypeId = $stmt->get_result();
                            $contentId = mysqli_fetch_assoc($contentTypeId);
                        
                            // Check the content type and increment the corresponding count
                            if ($contentId['content_type_name'] == "International") {
                                $international_count++;
                            } elseif ($contentId['content_type_name'] == "National") {
                                $national_count++;
                            } elseif ($contentId['content_type_name'] == "Regional") {
                                $regional_count++;
                            }
                        }
                        ?>
                    
                        <div class="post_count">
                            <h3>International: <?php echo $international_count?></h3>
                        </div>
                        <div class="post_count">
                            <h3>National: <?php echo $national_count?></h3>
                        </div>
                        <div class="post_count">
                            <h3>Regional: <?php echo $regional_count?></h3>
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
                <hr class = "hrline">

                <?php mysqli_data_seek($news_details, 0); ?>
                <div class="all_news">

                <h1 class="underline" style="text-align: center;">All News</h1>
                
                <?php
                    
                ?>
                    
                    <div>
                        <?php 
                        $count = 0;
                        while($row = mysqli_fetch_assoc($news_details)){

                            $stmt = $conn->prepare("SELECT * FROM content_type WHERE content_type_id = ?");  //
                            $stmt->bind_param('i', $row['content_type_id']);
                            $stmt->execute();
                            $contentTypeId = $stmt->get_result();
                            $contentId = mysqli_fetch_assoc($contentTypeId);
                            // $contentName = 
        
                            $stmt = $conn->prepare("SELECT * FROM news_category WHERE category_id = ?");  //
                            $stmt->bind_param('i', $row['category_id']);
                            $stmt->execute();
                            $category_Id = $stmt->get_result();
                            $categoryId = mysqli_fetch_assoc($category_Id);
                            
        
                            $stmt = $conn->prepare("SELECT * FROM language_type WHERE language_id = ?");  //
                            $stmt->bind_param('i', $row['language_id']);
                            $stmt->execute();
                            $language_Id = $stmt->get_result();
                            $languageId = mysqli_fetch_assoc($language_Id);
                        if($categoryId['category_name'] == "Business"){
                            if($count < 1){
                        ?>
                        <h1 class="underline">Business</h1>

                        <?php
                            $count = $count+1;
                        }
                        ?>
                        <div>
                            <a href="category_news.php#business">
                            <div class=" flex latest_news1">
                                <div class="news_text">
                                    <h2><?php echo $row['title']; ?></h2>
                                    <p><?php echo $row['content']; ?></p>
                                </div>
                                <div class="news_image">
                                    <img src="Assets/image/<?php echo $row['image1']; ?>" alt="img">
                            </div>
        
                        </div>
                     </a>                            
                        <div class="flex news_details">
                            <div class="news_type_box">
                                <h3>News-type : <?php echo $contentId['content_type_name'] ?></h3>
                            </div>
    
                            <div class="news_type_box">
                                <h3>Language : <?php echo $languageId['language_name'] ?></h3>
                            </div>

                            <div class="news_type_box">
                                <h3>Published Date : <?php echo $row['published_date'] ?></h3>
                            </div>

                        </div>
                        <?php
                             }
                        }
                        ?>
                <?php 
                
                mysqli_data_seek($news_details, 0); ?>
                <hr class = "hrline">
                <?php
                $count = 0;
                   while($row = mysqli_fetch_assoc($news_details)){

                    $stmt = $conn->prepare("SELECT * FROM content_type WHERE content_type_id = ?");  //
                    $stmt->bind_param('i', $row['content_type_id']);
                    $stmt->execute();
                    $contentTypeId = $stmt->get_result();
                    $contentId = mysqli_fetch_assoc($contentTypeId);
                    // $contentName = 

                    $stmt = $conn->prepare("SELECT * FROM news_category WHERE category_id = ?");  //
                    $stmt->bind_param('i', $row['category_id']);
                    $stmt->execute();
                    $category_Id = $stmt->get_result();
                    $categoryId = mysqli_fetch_assoc($category_Id);
                    

                    $stmt = $conn->prepare("SELECT * FROM language_type WHERE language_id = ?");  //
                    $stmt->bind_param('i', $row['language_id']);
                    $stmt->execute();
                    $language_Id = $stmt->get_result();
                    $languageId = mysqli_fetch_assoc($language_Id);
                if($categoryId['category_name'] == "Technology"){
                    if($count < 1){
                ?>

                    <h2 class="underline">Technology</h2>
                    <?php 
                        $count ++;
                    }
                    ?>

                <div>
                        <a href="category_news.php#technology">
                        <div class=" flex latest_news1">
                            <div class="news_text">
                                <h2><?php echo $row['title']; ?></h2>
                                <p><?php echo $row['content']; ?></p>
                            </div>
                            <div class="news_image">
                                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="img">
                            </div>
                        
                        </div>
                        </a>
                    <div class="flex news_details">
                        <div class="news_type_box">
                            <h3>News-type : <?php echo $contentId['content_type_name'] ?></h3>
                        </div>
                    
                        <div class="news_type_box">
                            <h3>Language : <?php echo $languageId['language_name'] ?></h3>
                        </div>
                        <div class="news_type_box">
                                <h3>Published Date : <?php echo $row['published_date'] ?></h3>
                            </div>

                    </div>
                    <?php
                         }
                    }
                    ?>

                    <?php
                    
                    mysqli_data_seek($news_details, 0); ?>
                    <hr class = "hrline">
                <?php
                $Count = 0;
                   while($row = mysqli_fetch_assoc($news_details)){

                    $stmt = $conn->prepare("SELECT * FROM content_type WHERE content_type_id = ?");  //
                    $stmt->bind_param('i', $row['content_type_id']);
                    $stmt->execute();
                    $contentTypeId = $stmt->get_result();
                    $contentId = mysqli_fetch_assoc($contentTypeId);
                    // $contentName = 

                    $stmt = $conn->prepare("SELECT * FROM news_category WHERE category_id = ?");  //
                    $stmt->bind_param('i', $row['category_id']);
                    $stmt->execute();
                    $category_Id = $stmt->get_result();
                    $categoryId = mysqli_fetch_assoc($category_Id);
                    

                    $stmt = $conn->prepare("SELECT * FROM language_type WHERE language_id = ?");  //
                    $stmt->bind_param('i', $row['language_id']);
                    $stmt->execute();
                    $language_Id = $stmt->get_result();
                    $languageId = mysqli_fetch_assoc($language_Id);
                if($categoryId['category_name'] == "Sports"){
                
                    
                        if($Count < 1){
                            ?>
                        <h1 class= "underline">Sports</h1>
                        <?php
                        $Count = $Count+1;
                    }
                    ?>
                    <div>
                        <a href="category_news.php#sports">
                        <div class=" flex latest_news1">
                            <div class="news_text">
                                <h2><?php echo $row['title']; ?></h2>
                                <p><?php echo $row['content']; ?></p>
                            </div>
                            <div class="news_image">
                                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="img">
                            </div>
                        
                        </div>
                        </a>
                    <div class="flex news_details">
                        <div class="news_type_box">
                            <h3>News-type : <?php echo $contentId['content_type_name'] ?></h3>
                        </div>
                        
                        <div class="news_type_box">
                            <h3>Language : <?php echo $languageId['language_name'] ?></h3>
                        </div>
                        <div class="news_type_box">
                                <h3>Published Date : <?php echo $row['published_date'] ?></h3>
                            </div>

                    </div>

                    <?php
                    // }elseif($categoryId['category_name'] == "Others"){
                        }
                    }
                    ?>

                    <?php 
                    
                    mysqli_data_seek($news_details, 0); ?>
                <hr class = "hrline">
                <?php
                $count = 0;
                   while($row = mysqli_fetch_assoc($news_details)){

                    $stmt = $conn->prepare("SELECT * FROM content_type WHERE content_type_id = ?");  //
                    $stmt->bind_param('i', $row['content_type_id']);
                    $stmt->execute();
                    $contentTypeId = $stmt->get_result();
                    $contentId = mysqli_fetch_assoc($contentTypeId);
                    // $contentName = 

                    $stmt = $conn->prepare("SELECT * FROM news_category WHERE category_id = ?");  //
                    $stmt->bind_param('i', $row['category_id']);
                    $stmt->execute();
                    $category_Id = $stmt->get_result();
                    $categoryId = mysqli_fetch_assoc($category_Id);
                    

                    $stmt = $conn->prepare("SELECT * FROM language_type WHERE language_id = ?");  //
                    $stmt->bind_param('i', $row['language_id']);
                    $stmt->execute();
                    $language_Id = $stmt->get_result();
                    $languageId = mysqli_fetch_assoc($language_Id);
                if($categoryId['category_name'] == "Other"){
                    if($count < 1){
                ?>

                    <h1 class="underline">Other</h1>

                    <?php

                    $count++;
                    }

                    ?>
                    <div>
                        <a href="category_news.php#other">
                        <div class=" flex latest_news1">
                            <div class="news_text">
                                <h2><?php echo $row['title']; ?></h2>
                                <p><?php echo $row['content']; ?></p>
                            </div>
                            <div class="news_image">
                                <img src="Assets/image/<?php echo $row['image1']; ?>" alt="img">
                            </div>
                        
                        </div>
                        </a>
                    <div class="flex news_details">
                        <div class="news_type_box">
                            <h3>News-type : <?php echo $contentId['content_type_name'] ?></h3>
                        </div>
                        
                        <div class="news_type_box">
                            <h3>Language : <?php echo $languageId['language_name'] ?></h3>
                        </div>
                        <div class="news_type_box">
                                <h3>Published Date : <?php echo $row['published_date'] ?></h3>
                            </div>

                    </div>


            </div>
            <?php
                    }
                }
            ?>
    </div>    

</body>


    <style>

        .hrline{
            width :90%;
            margin : 50px auto;
            height:3px;
            
        }

.content{
            background: rgb(255, 255, 255);
            padding-top: 50px;
            padding-left: 30px;
        }

        /* .content1{
            background: white;
            border: solid;
            margin: auto 100px;
            padding-top: 70px;
        } */
        .total_post{
            position:fixed;
            border-top: 1px solid grey;
            border-width:1px;
            width: 20%;
            height: 200px;
            right: 50px;
            top:108px;
            padding:10px;
            background-color: #bcbabadd;



            
        }

        .post_count{
            margin:5px;
        }

        .latest_news{
            width: 65%;

        }

        .latest_news1{
            /* border: 1px solid black; */

            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            width:100%;
        }

        .latest_news1 .news_text{
            width: 77%;
            height: 140px;
            overflow: hidden;
        }

        .latest_news1 .news_image{
            border: 1px solid black;
            width: 22%;
            height: 140px;
        }

        .conten_heading{
            margin: 35px  auto 10px 80px;
        }




        /* .actual-content{
            max-width:1100px;
            width:95%;
            /* margin: 30px auto; */
            /* margin: 70px auto auto 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;

        } */ 




       /* .card{
        max-width: 350px;
        flex: 1 1 310px;
        text-align: center;
        height: 320px;
        border-width: 1px;
        margin: 20px;
        overflow:hidden; */
        /* box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); */
       /* } */

       .news_text h2{
            overflow: hidden;
            height:35%;
       }

       .news_text p{
            overflow: hidden;
            height: 65%;
            font-size:20px;
       }

       .news_image{
        /* height: 75%; */
        /* margin-bottom: 20px; */
       }

       .news_image img{
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

       .all_news{
        margin-top: 40px;
        width: 85%;
       }
       
       .news_details{
        height: 50px;
        width: 80%;
        font-size:20px;
       }
       .news_type_box{
        height: 100%;
       }
    </style>
    
</html>