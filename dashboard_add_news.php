<?php

session_start();

if ( isset( $_POST[ 'contentType' ] ) && isset( $_POST[ 'category' ] ) && isset( $_POST[ 'language' ] ) && isset( $_POST[ 'title' ] ) && isset( $_POST[ 'body' ] ) && isset( $_POST['publishedDate']) ) {

    // Database connection details
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "news_portal"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Disable foreign key checks
    $conn->query("SET FOREIGN_KEY_CHECKS=0;");

    // Prepare and bind SQL statements
    $stmt1 = $conn->prepare("INSERT INTO content_type (content_type_name) VALUES (?)");
    $stmt1->bind_param("s", $contentType);

    $stmt2 = $conn->prepare("INSERT INTO news_category (category_name) VALUES (?)");
    $stmt2->bind_param("s", $category);

    $stmt3 = $conn->prepare("INSERT INTO language_type (language_name) VALUES (?)");
    $stmt3->bind_param("s", $language);

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';

    $stmt4 = $conn->prepare("INSERT INTO news (content_type_id, category_id, language_id, title, content, published_date, user_id2, image1) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt4->bind_param("iiisssis", $contentId, $categoryId, $languageId, $title, $body, $publishedDate, $user_id, $img_name);

    // Set parameters and execute for content_type
    $contentType = $_POST["contentType"];
    if ($stmt1->execute()) {
        $contentId = $stmt1->insert_id; // Get the ID of the newly inserted row
    } else {
        echo "Error: " . $stmt1->error;
    }

    // Set parameters and execute for category_type
    $category = $_POST["category"];
    if ($stmt2->execute()) {
        $categoryId = $stmt2->insert_id;
    } else {
        echo "Error: " . $stmt2->error;
    }

    // Set parameters and execute for language_type
    $language = $_POST["language"];
    if ($stmt3->execute()) {
        $languageId = $stmt3->insert_id;
    } else {
        echo "Error: " . $stmt3->error;
    }

    // Set parameters and execute for news
    $title = $_POST["title"];
    $body = $_POST["body"];
    $publishedDate = $_POST["publishedDate"];
    //$userId = $_POST['user_id'];
    // $imageUpload = $_POST["imageUpload"]; // Assuming you're storing the image path or name in the database

    $img_name = $_FILES['img_upload']['name'];
    $tmp_img_name =  $_FILES['img_upload']['tmp_name'] ;
    $folder = 'Assets/image/'.$img_name;


    // Execute the statement
    if ($stmt4->execute()) {

        if(move_uploaded_file($tmp_img_name, $folder)){
            header( 'Location: dashboard_add_news.php?message=success' );
            exit();
        }
    } else {
        echo "Error: " . $stmt4->error;
    }

    // Close statements and database connection
    $stmt1->close();
    $stmt2->close();
    $stmt3->close();
    $stmt4->close();


    // Enable foreign key checks
    $conn->query("SET FOREIGN_KEY_CHECKS=1;");

    $conn->close();

}


// $message = isset($_GET['message']) ? $_GET['message'] : "";

//$userId = isset($_GET['userId']) ? $_GET['userId'] : "";
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] :'';
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';
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
                <li><span><a href="dashboard_add_article.php"> <i class="fa-solid fa-pen-to-square"></i>Add Article</a></span></li><hr class="hr">
                <li class="select_tab"><span><a  href=""><i class="fa-solid fa-square-pen"></i> Add News</a></span></li><hr class="hr">
                <li><span><a href="dashboard_view_article.php"><i class="fa-solid fa-book-open"></i> View Article</a></span></li><hr class="hr">
                <li><span><a href="dashboard_view_News.php"><i class="fa-regular fa-newspaper"></i> View News</a></span></li><hr class="hr">
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
                <div id="successMessage">
            <?php
            if (isset($_GET['message']) && $_GET['message'] == 'success') {
                echo "<h1 class='success-message'>News Article has been published!</h1>";
            }
            ?>
            </div>
            <script>
        // Function to hide the message
        function hideMessage() {
            var messageDiv = document.getElementById('successMessage');
            messageDiv.style.opacity = '0';
        }

        // Hide the message after 5 seconds (5000 milliseconds)
        setTimeout(hideMessage, 3000);
    </script>
                <form action="" method="post" class="form-box" enctype = "multipart/form-data">
                <?php
                       // $userId = isset($_GET['userId']) ? $_GET['userId'] : "";
                    ?>
                <input type="hidden" name="userId" value="<?php echo htmlspecialchars($userId); ?>">
                    <div class="flex">

                        <div class="box">
                            <label for="contentType">Content Type:</label><br>
                            <select id="contentType" name="contentType" >
                                <option value="default">Choose Content type</option>
                              <option value="International">International</option>
                              <option value="National">National</option>
                              <option value="Regional">Regional</option>
                            </select>
                          </div>


                        <div class="box">
                            <label for="category">Category:</label><br>
                            <select id="category" name="category" >
                              <option value="Other">Other</option>
                              <option value="Sports">Sports</option>
                              <option value="Business">Business</option>
                              <option value="Technology">Technology</option>
                            </select>
                          </div>
    
                          
    
                          <div class="box">
                            <label for="language">Language:</label><br>
                            <select id="language" name="language">
                              <option value="default">Choose Language</option>
                              <option value="English">English</option>
                              <option value="Hindi">Hindi</option>
                              <option value="Assamese">Assamese</option>
                            </select>
                          </div>
                        </div>
                    <div class="box">
                      <label for="title">News Title:</label><br>
                      <input type="text" id="title" name="title" placeholder="Enter title..." required>
                    </div>
                  
                    <div class="box">
                      <label for="body">Content:</label><br>
                      <textarea id="body" name="body" rows="10" placeholder="Type your content here..." required></textarea>
                    </div>


                    

                    
                      <div class="box">
                        <label for="publishedDate">Publish Date:</label><br>
                        <input type="date" id="publishedDate" name="publishedDate" required>
                      </div>

                      <div class="box">
                        <label for="imageUpload"></label>
                        Image Upload (optional):<br>
                        <input type="file" accept=".jpg,.jpeg,.png,/.gif"  name="img_upload">
                        <!-- <input type="file" accept=".jpg,.jpeg,.png,/.gif" id="imageUpload" name="imageUpload"> -->
                      </div>


                    <div class="box">
                      <input type="submit" value="Submit">
                    </div>
                  </form>
            </div>    
    </body>

    
</html>
















<!-- depricat -->
<!-- <div class="content">

    <div class="cards">
                    <div class="card">
                    <div class="box"> 
                        <h1>2195</h1>
                        <h3>Students</h3>
                    </div> 
                    <div class="icon-case">
                        <img src="" alt="img">
                    </div>
                    
                    </div>
                    <div class="card">
                        <div class="box"> 
                            <h1>2195</h1>
                            <h3>Student</h3>
                        </div> 
                        <div class="icon-case">
                            <img src="" alt="img">
                        </div>
                        
                        </div>
                        <div class="card">
                            <div class="box"> 
                                <h1>2195</h1>
                                <h3>Student</h3>
                            </div> 
                            <div class="icon-case">
                                <img src="" alt="img">
                            </div>
                            
                            </div>
                            <div class="card">
                                <div class="box"> 
                                    <h1>2195</h1>
                                    <h3>Student</h3>
                                </div> 
                                <div class="icon-case">
                                    <img src="" alt="img">
                                </div>
                                
                                </div>
                </div>
                <div class="content-2">
                    <div class="recent-payments">
                        <div class="title">
                            <h2>Recent payments</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Name</th>
                                <th>Name</th>
                                <th>option</th>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td>John Doe</td>
                                <td><a href="#" class="btn">View</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="new-students">
                        <div class="title">
                            <h2>New Students</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                            <tr>
                                <td><img src="" alt="img"></td>
                                <td>John Steve Doe</td>
                                <td><img src="" alt="img"></td>
                            </tr>
                        </table>
                    </div>
                </div>
</div> -->