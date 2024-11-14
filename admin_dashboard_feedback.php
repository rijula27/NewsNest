<?php
session_start();

include('dbconnection.php');

$delete = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_btn_set'])) {
        $f_id = $_POST['delete_id'];

        $delete_query = "DELETE FROM feedback WHERE f_id = ?";

        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param('i', $f_id);
        if ($stmt->execute()) {
            echo json_encode(array('status' => 'success', 'message' => 'User Account deleted successfully'));
            exit();
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete User Account: ' . $conn->error));
            exit();
        }
        $stmt->close();
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

<!DOCTYPE html>
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
    <div class=''>
        <div class='sidebar'>
            <h2 class=''>Dashboard</h2>
            <ul class='sidebar_menu'>
                <li><a href='admin_dashboard_userView.php'><i class="fa-regular fa-user"></i> User</a></li>
                <hr />
                <li><a href="admin_dashboard_bulletinBoard.php"><i class="fa-solid fa-list"></i> Bulletin Board</a></li>
                <hr />
                <li><a href='admin_dashboard_news.php'><i class="fa-regular fa-newspaper"></i> News</a></li>
                <hr />
                <li><a href="admin_dashboard_article.php"><i class="fa-regular fa-pen-to-square"></i> Article</a></li>
                <hr />
                <li id='select_tab'><a href=""><i class="fa-regular fa-comments"></i> Feedback</a></li>
                <hr />
            </ul>
            <div class='logout'>
                <a href='logout.php'><button id='logout'>Log Out</button></a>
            </div>
        </div>

        <div class='content'>
            <div class='requestList'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>Feedback</h1>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>date</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $stmt = $conn->prepare('SELECT * FROM feedback ORDER BY f_id DESC');
                    $stmt->execute();
                    $info = $stmt->get_result();
                    while ($feedback = mysqli_fetch_assoc($info)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $feedback['name'] ?></td>
                            <td><?php echo $feedback['email'] ?></td>
                            <td><?php echo $feedback['subject'] ?></td>
                            <td><?php echo $feedback['message'] ?></td>
                            <td><?php echo $feedback['date'] ?></td>
                            <td><input type="hidden" class="delete_id_value" value="<?php echo $feedback['f_id']; ?>">
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
                        text: "Once deleted, you will not be able to recover this User Details!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type: "POST",
                                url: "admin_dashboard_feedback.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    if (data.status == "success") {

                                        // Show success message
                                        swal("Success", "The Feedback has been deleted successfully!", "success").then(() => {
                                            // Reload the page
                                            location.reload();
                                        });
                                    } else {
                                        // If deletion fails, show an error message
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
    /* Actual content */

    .content {
        min-height: 86vh;
    }

    .requestList {
        margin: 80px auto auto 65px;
    }

    .requestList table {
        margin-top: 30px;
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

    #approved {
        background-color: rgb(60, 139, 244);
        width: 80px;
        height: 40px;
        border-radius: 5px;
        font-size: large;
        margin: 10px;
        cursor: pointer;
        color: White;
        font-family: Arial, Helvetica, sans-serif;
    }

    #select_tab {
        color: black;
    }
</style>

</html>
