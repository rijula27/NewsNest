<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->




<?php

// session_start();

if ( isset( $_POST[ 'title' ] ) && isset( $_POST[ 'body' ] ) && isset( $_POST[ 'publishedDate' ] ) ) {

    $servername = 'localhost';

    $username = 'root';

    $password = '';

    $dbname = 'news_portal';

    // Create connection
    $conn = new mysqli( $servername, $username, $password, $dbname );

    // Check connection
    if ( $conn->connect_error ) {
        die( 'Connection failed: ' . $conn->connect_error );
    }

    // Disable foreign key checks
    $conn->query( 'SET FOREIGN_KEY_CHECKS=0;' );

    // Prepare and bind SQL statements
    $stmt1 = $conn->prepare( 'INSERT INTO article ( title, content, published_date, user_id3, image1) VALUES (?, ?, ?,?, ?)' );
    $stmt1->bind_param( 'sssis', $title, $body, $publishedDate, $userId, $img_name );

    // Set parameters and execute for news
    $title = $_POST[ 'title' ];
    $body = $_POST[ 'body' ];
    $publishedDate = $_POST[ 'publishedDate' ];
    $userId = $_POST[ 'userId' ];
    // $imageUpload = $_POST[ 'imageUpload' ];
    // Assuming you're storing the image path or name in the database

    $img_name = $_FILES['img_upload']['name'];
    $tmp_img_name = $_FILES[ 'img_upload' ][ 'tmp_name' ];
    $folder = 'Assets/image/'.$img_name;





    // Execute the statement
    if ($stmt1->execute()) {
        // echo "New record created successfully";
        if(move_uploaded_file($tmp_img_name, $folder)){
            header( 'Location: login.php?message = Your%20Article%20is%20submitted%20Succesfully.' );

         }
        //else{
        //     eheader( 'Location: login.php?message = Your%20Article%20is%20submitted%20Succesfully.' );

        // this block will execute if the article upload without image.
        // }
    } else {
        echo "Error: " . $stmt4->error;
    }

    // Close statements and database connection
    $stmt1->close();


    // Enable foreign key checks
    $conn->query("SET FOREIGN_KEY_CHECKS=1;");

    $conn->close();

}


$message = isset($_GET['message']) ? $_GET['message'] : "";

$userId = isset($_GET['userId']) ? $_GET['userId'] : "";

$adminName = isset($_SESSION['user_name']) ?  $_SESSION['user_name'] : "";
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/dashboard.css">
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
                    <li class="select_tab"><img src="" alt="img">&nbsp;<span><a href="">Add Article</a></span></li><hr class="hr">
                    <li><img src="" alt="img">&nbsp;<span><a href="dashboard_add_news.php?message=<?php echo urlencode($message); ?>&userId=<?php echo urlencode($userId); ?>">Add News</a></span></li><hr class="hr">
                    <li><img src="" alt="img">&nbsp;<span><a href="dashboard_view_article.php?message=<?php echo urlencode($message); ?> &userId=<?php echo urlencode($userId); ?>">View Article</a></span></li><hr class="hr">
                    <li><img src="" alt="img">&nbsp;<span><a href="dashboard_view_news.php?message=<?php echo urlencode($message); ?> &userId=<?php echo urlencode($userId); ?>">View News</a></span></li><hr class="hr">
                    <li><img src="" alt="img">&nbsp;<span><a href="index.php">Help</a></span></li>
                </div>

                <div>
                    <div class="flex">
                    <!-- <li><a href="" class="logout_button">Change Password</a></li> -->
                        <li class="hoveroff" style="background-color: #cdc8c800;"><a href="" class="logout_button"><button>Logout</button></a></li>
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
                            
                       <!-- <a href="#" class="user_name">name</a> -->
                       <?php
                    
                    echo '<a href = '#' class = 'user_name'>' . htmlspecialchars($message) . '</a>';
                    // echo '<a href = '#' class = 'user_name'>' . htmlspecialchars($email) . '</a>';
                    ?>
                    
                            <div class="img-case">
                                <a href=""><img src="Kaustav dp.jpg" alt="img"></a>
                            </div>
                        </div>
                    </div>    
                </div> 
    </div>  

            <div id="message">
             </div>
            <div class="content">
                <form class="form-box" action="" method="post" enctype="multipart/form-data">
                    <?php
                        $userId = isset($_GET['userId']) ? $_GET['userId' ] : '';
    ?>
    <input type = 'hidden' name = 'userId' value = "<?php echo htmlspecialchars($userId); ?>">

    <div class = 'box'>
    <label for = 'title'>Article Name:</label><br>
    <input type = 'text' id = 'title' name = 'title' placeholder = 'Enter title...' required>
    </div>

    <div class = 'box'>
    <label for = 'body'>Article:</label><br>
    <textarea id = 'body' name = 'body' rows = '10' placeholder = 'Type your content here...' required></textarea>
    </div>

    <div class = 'box'>
    <label for = 'publishedDate'>Publish Date:</label><br>
    <input type = 'date' id = 'publishedDate' name = 'publishedDate' required>
    </div>

    <div class = 'box'>
    <label for = 'imageUpload'></label>
    Image Upload ( optional ):<br>
    <input type = 'file' accept = '.jpg, .jpeg, .png, /.gif' name = 'img_upload' required>
    <!-- <input type = 'file' accept = '.jpg, .jpeg, .png, /.gif' id = 'imageUpload' name = 'imageUpload'> -->
    </div>

    <div class = 'box' style = "width: 50%; margin-left: 25%;
                    margin-top: 50px;">
    <input type = 'submit' value = 'Submit'>
    </div>
    </form>
    </div>

    </body>
    </html>
