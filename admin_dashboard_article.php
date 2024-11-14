<?php
session_start();

include('dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_btn_set']) && isset($_POST['delete_id'])) {
        $article_id = $_POST['delete_id'];

        $delete_query = "DELETE FROM article WHERE article_id = '$article_id'";
        $result = mysqli_query($conn, $delete_query);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Article deleted successfully'));
            exit();
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete article'));
            exit();
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
        exit();
    }
}

$message = isset($_GET['message']) ? $_GET['message'] : '';
$userId = isset($_GET['userId']) ? $_GET['userId'] : '';
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
                <li><a href='admin_dashboard_news.php'><i class="fa-regular fa-newspaper"></i> News</a></li>
                <hr />
                <li id='select_tab'><a href=''><i class="fa-regular fa-pen-to-square"></i> Article</a></li>
                <hr />
                <li><a href="admin_dashboard_feedback.php"><i class="fa-regular fa-comments"></i> Feedback</a></li>
            </ul>
            <div class='logout'>
                <a href='logout.php'><button id='logout'>Log Out</button></a>
            </div>
        </div>

        <div class='content'>
            <div class='article'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>Article list</h1>
                <table>
                    <th>Article Id</th>
                    <th>Title</th>
                    <th>Publish Date</th>
                    <th>Creator Id</th>
                    <th>Delete</th>

                    <?php
                    $stmt = $conn->prepare('SELECT * FROM article ORDER BY published_date DESC');
                    $stmt->execute();
                    $article_details = $stmt->get_result();
                    while ($row = mysqli_fetch_assoc($article_details)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $row['article_id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['published_date'] ?></td>
                            <td><?php echo $row['user_id3'] ?></td>
                            <td><input type="hidden" class="delete_id_value" value="<?php echo $row['article_id']; ?>">
                                <a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax '>Delete</button></a></td>
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
                        text: "Once deleted, you will not be able to recover this Article!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "admin_dashboard_article.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    if (data.status == "success") {
                                        swal("Success", "The Article has been deleted successfully!", "success").then(() => {
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

<style>
    .article {
        padding-left: 50px;
        padding-top: 30px;
        padding-bottom: 50px;
        font-family: Arial, Helvetica, sans-serif;
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

</html>
