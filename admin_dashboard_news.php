<?php
// Start session and include database connection
session_start();
include('dbconnection.php');

$delete = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the delete button and delete id are set
    if (isset($_POST['delete_btn_set']) && isset($_POST['delete_id'])) {
        $news_id = $_POST['delete_id'];

        // Perform the deletion query
        $delete_query = "DELETE FROM news WHERE news_id = '$news_id'";
        $result = mysqli_query($conn, $delete_query);

        if ($result) {
            // Deletion successful
            echo json_encode(array('status' => 'success', 'message' => 'News deleted successfully'));
            exit();
        } else {
            // Deletion failed
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete News'));
            exit();
        }
    } else {
        // Invalid request
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
        exit();
    }
}

// Retrieve message and user id from GET parameters
$message = isset($_GET['message']) ? $_GET['message'] : '';
$userId = isset($_GET['userId']) ? $_GET['userId'] : '';

// Retrieve admin name and admin id from session
$adminName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';
$admin_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : '';
$img = isset($_SESSION['img']) ? $_SESSION['img'] :'';
?>

<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <script src='https://kit.fontawesome.com/3d8df9be04.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel='stylesheet' href='Assets/style/admin_dashboard_update.css' />
    <title>Document</title>

    <style>
        .international,
        .regional {
            padding-left: 50px;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        .national {
            padding-left: 50px;
            padding-top: 30px;
            padding-bottom: 50px;
        }

        hr {
            color: black;
            height: 2px;
        }

        table {
            width: 65vw;
            border-collapse: collapse;
        }

        th {
            border-top: 1px solid grey;
            border-bottom: 1px solid grey;
            padding: 10px;
            border-collapse: collapse;
            font-size: larger;
            font-weight: 900;
            font-family: Arial, Helvetica, sans-serif;
        }

        td {
            text-align: center;
            border-collapse: collapse;
            font-size: large;
            font-family: Arial, Helvetica, sans-serif;
            color: grey;
        }

        #delete {
            background-color: rgb(245, 63, 35);
            width: 80px;
            height: 40px;
            border-radius: 5px;
            font-size: large;
            margin: 10px;
            cursor: pointer;
            color: White;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class='navbar'>
        <div class='flex navbar_item'>
            <a href='index.php'><img src='logo.png' alt='' /></a>
            <div class='flex'>
                <?php echo '<a href="#" class="user_name">' . htmlspecialchars($adminName) . '</a>'; ?>
                <!-- <a href='' id='profile_picture'><img src='Kaustav dp.jpg' alt='img' /></a> -->
                <a href = "" id='profile_picture'><img src="Assets/image/<?php echo $img; ?>" alt=""></a>
            </div>
        </div>
    </div>
    <div class='flex'>
        <div class='sidebar'>
            <h2 class=''>Dashboard</h2>
            <ul class='sidebar_menu'>
                <li><a href='admin_dashboard_userView.php'><i class="fa-regular fa-user"></i> User</a></li>
                <hr />
                <li><a href="admin_dashboard_bulletinBoard.php"><i class="fa-solid fa-list"></i> Bulletin Board</a></li>
                <hr />
                <li id='select_tab'><a href=''><i class="fa-regular fa-newspaper"></i> News</a></li>
                <hr />
                <li><a href="admin_dashboard_article.php"><i class="fa-regular fa-pen-to-square"></i> Article</a></li>
                <hr />
                <li><a href="admin_dashboard_feedback.php"><i class="fa-regular fa-comments"></i> Feedback</a></li>
                <hr />
            </ul>
            <div class='logout'>
                <a href='logout.php'><button id='logout'>Log Out</button></a>
            </div>
        </div>

        <div class='content'>
            <div class='international'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>International</h1>
                <table>
                    <tr>
                        <th>News Id</th>
                        <th>News Title</th>
                        <th>Published Date</th>
                        <th>User Id</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    // Retrieve international news
                    $stmt = $conn->prepare('SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "International"');
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while ($row = mysqli_fetch_assoc($news_details)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $row['news_id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['published_date'] ?></td>
                            <td><?php echo $row['user_id2'] ?></td>
                            <td>
                                <input type="hidden" class="delete_id_value" value="<?php echo $row['news_id']; ?>">
                                <a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax' id="delete">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <hr>
            <!-- National news section -->
            <div class='national'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>National</h1>
                <table>
                    <tr>
                        <th>News Id</th>
                        <th>News Title</th>
                        <th>Published Date</th>
                        <th>User Id</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    // Retrieve national news
                    $stmt = $conn->prepare('SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "National"');
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while ($row = mysqli_fetch_assoc($news_details)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $row['news_id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['published_date'] ?></td>
                            <td><?php echo $row['user_id2'] ?></td>
                            <td>
                                <input type="hidden" class="delete_id_value" value="<?php echo $row['news_id']; ?>">
                                <a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax' id="delete">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <hr>
            <!-- Regional news section -->
            <div class='regional'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>Regional</h1>
                <table>
                    <tr>
                        <th>News Id</th>
                        <th>News Title</th>
                        <th>Published Date</th>
                        <th>User Id</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    // Retrieve regional news
                    $stmt = $conn->prepare('SELECT * FROM news 
                        INNER JOIN content_type ON news.content_type_id = content_type.content_type_id 
                        WHERE content_type.content_type_name = "Regional"');
                    $stmt->execute();
                    $news_details = $stmt->get_result();
                    while ($row = mysqli_fetch_assoc($news_details)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $row['news_id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['published_date'] ?></td>
                            <td><?php echo $row['user_id2'] ?></td>
                            <td>
                                <input type="hidden" class="delete_id_value" value="<?php echo $row['news_id']; ?>">
                                <a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax' id="delete">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e) {
                e.preventDefault();
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this News!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "admin_dashboard_news.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    if (data.status == "success") {
                                        swal("Success", "The News has been deleted successfully!", "success").then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        swal("Error", data.message, "error");
                                    }
                                }
                            });
                        }
                    });
            });
        });
    </script>
</body>

</html>
