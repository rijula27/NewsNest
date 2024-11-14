<?php
session_start();

if (isset($_POST['title']) && isset($_POST['body']) && isset($_POST['publishedDate'])) {

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'news_portal';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Disable foreign key checks
    $conn->query('SET FOREIGN_KEY_CHECKS=0;');

    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id']:'';
    
    // Prepare and bind SQL statements
    $stmt1 = $conn->prepare('INSERT INTO article (title, content, published_date, user_id3, image1) VALUES (?, ?, ?,?, ?)');
    $stmt1->bind_param('sssis', $title, $body, $publishedDate, $userId, $img_name);

    // Set parameters and execute for news
    $title = $_POST['title'];
    $body = $_POST['body'];
    $publishedDate = $_POST['publishedDate'];
    //$userId = $_POST['userId'];

    $img_name = $_FILES['img_upload']['name'];
    $tmp_img_name = $_FILES['img_upload']['tmp_name'];
    $folder = 'Assets/image/' . $img_name;

    // Execute the statement
    if ($stmt1->execute()) {
        if (move_uploaded_file($tmp_img_name, $folder)) {
            // header('Location: dashboard_add_article.php');
            $_SESSION['message'] = 'Your Article has been published!';
            header('Location: dashboard_add_article.php');
            exit();
        }else {
            $_SESSION['message'] = 'Failed to upload image.';
        }
    } else {
        echo "Error: " . $stmt4->error;
    }

    // Close statements and database connection
    $stmt1->close();

    // Enable foreign key checks
    $conn->query("SET FOREIGN_KEY_CHECKS=1;");

    $conn->close();
}

//$message = isset($_GET['message']) ? $_GET['message'] : "";
//$userId = isset($_GET['userId']) ? $_GET['userId'] : "";
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] :'';
$img = isset($_SESSION['img']) ? $_SESSION['img'] :'';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/style/dashboard.css">
    <script src="https://kit.fontawesome.com/3d8df9be04.js" crossorigin="anonymous"></script>

    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div>
            <h3 class="dashboard-heading underline">Dashboard</h3>
            <ul>
                <div>
                    <li class="select_tab"><span><a href=""><i class="fa-solid fa-pen-to-square"></i> Add Article</a></span></li><hr class="hr">
                    <li><span><a href="dashboard_add_news.php"><i class="fa-solid fa-square-pen"></i> Add News</a></span></li><hr class="hr">
                    <li><span><a href="dashboard_view_article.php"><i class="fa-solid fa-book-open"></i> View Article</a></span></li><hr class="hr">
                    <li><span><a href="dashboard_view_news.php"><i class="fa-regular fa-newspaper"></i> View News</a></span></li><hr class="hr">
                    <li><span><a href="contact.php"><i class="fa-solid fa-comment"></i> Help</a></span></li>
                </div>
                <style>
                    .side-menu li span {
  font-weight: 100;
}
                </style>
                <div>
                    <div class="flex">
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
        <div id="message"></div>
        <div class="content">
            <form class="form-box" action="" method="post" enctype="multipart/form-data">
                <div id="successMessage">
              <?php
                //$userId = isset($_GET['userId']) ? $_GET['userId'] : '';
                if (isset($_SESSION['message'])) {
                    echo '<h1>' . htmlspecialchars($_SESSION['message']) . '</h1>';
                    unset($_SESSION['message']);
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


                <input type='hidden' name='userId' value="<?php echo htmlspecialchars($userId); ?>">
                <div class='box'>
                    <label for='title'>Article Name:</label><br>
                    <input type='text' id='title' name='title' placeholder='Enter title...' required>
                </div>
                <div class='box'>
                    <label for='body'>Article:</label><br>
                    <textarea id='body' name='body' rows='10' placeholder='Type your content here...' required></textarea>
                </div>
                <div class='box'>
                    <label for='publishedDate'>Publish Date:</label><br>
                    <input type='date' id='publishedDate' name='publishedDate' required>
                </div>
                <div class='box'>
                    <label for='imageUpload'></label>
                    Image Upload (optional):<br>
                    <input type='file' accept='.jpg, .jpeg, .png, /.gif' name='img_upload' required>
                </div>
                <div class='box' style="width: 50%; margin-left: 25%; margin-top: 50px;">
                    <input type='submit' value='Submit'>
                </div>
            </form>
        </div>
    </div>
</body>


</html>
