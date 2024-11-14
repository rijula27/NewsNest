<?php

session_start();
include('dbconnection.php');

// Function to handle success messages
function setSuccessMessage($message) {
    $_SESSION['successMessage'] = $message;
    header("Location: admin_dashboard_bulletinBoard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['bb_content']) && isset($_POST['publishedDate'])) {
        $conn->query('SET FOREIGN_KEY_CHECKS=0;');

        $stmt = $conn->prepare('INSERT INTO bulletin_board (content, published_date, admin_id) VALUES (?, ?, ?)');
        $stmt->bind_param('ssi', $body, $published_date, $admin_id);

        $body = $_POST['bb_content'];
        $published_date = date('Y-m-d');
        $admin_id = $_POST['admin_id'];

        if ($stmt->execute()) {
            // header('Location: admin_dashboard_bulletinBoard.php');
            // header("Location: admin_dashboard_bulletinBoard.php?succesMessage=" . urlencode("Bulletin Board upload succesfull."));
            setSuccessMessage("News Bulletin has been added succesfully.");

        } else {
            echo 'Error: ' . $conn->error;
        }

        $stmt->close();

        $conn->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    elseif (isset($_POST['delete_btn_set']) && isset($_POST['delete_id'])) {
        $bb_id = $_POST['delete_id'];

        $delete_query = "DELETE FROM bulletin_board WHERE b_id = '$bb_id'";
        $result = mysqli_query($conn, $delete_query);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Bulletin Point deleted successfully'));
            exit();
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete Headline!'));
            exit();
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
        exit();
    }
}

$message = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : '';
unset($_SESSION['successMessage']); 
$userId = isset($_GET['userId']) ? $_GET['userId'] : '';
$adminName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';
$admin_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : "";
$img = isset($_SESSION['img']) ? $_SESSION['img'] :'';

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <script src='https://kit.fontawesome.com/3d8df9be04.js' crossorigin='anonymous'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
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
            <h2 class='underline'>Dashboard</h2>
            <ul class='sidebar_menu'>
                <li><a href='admin_dashboard_userView.php'><i class="fa-regular fa-user"></i>User</a></li>
                <hr />
                <li id='select_tab'><a href=''><i class="fa-solid fa-list"></i> Bulletin Board</a></li>
                <hr />
                <li><a href='admin_dashboard_news.php'><i class="fa-regular fa-newspaper"></i> News</a></li>
                <hr />
                <li><a href='admin_dashboard_article.php'><i class="fa-regular fa-pen-to-square"></i> Article</a></li>
                <hr />
                <li><a href="admin_dashboard_feedback.php"><i class="fa-regular fa-comments"></i> Feedback</a></li>
                <hr />
            </ul>
            <div class='logout'>
                <a href='logout.php'><button id='logout'>Log Out</button></a>
            </div>
        </div>

        <div class='content'>
        <style>
        /* Define CSS styles for the success message */
        #message {
        padding: 20px;
    /* color: #0000ff; */
    color:green;
    margin: 20px auto 0;
    font-size:20px;
    max-width: 600px;
    text-align: center;
    opacity: 1;
            transition: opacity 1s ease-out;
    }
    </style>


<div id="message">
    <?php
                if (!empty($message)) {
                    echo '<h2>' . htmlspecialchars($message) . '</h2>';
                }
                ?>
        
    </div>
    <script>
        // Function to hide the message
        function hideMessage() {
            var messageDiv = document.getElementById('message');
            messageDiv.style.opacity = '0';
        }

        // Hide the message after 5 seconds (5000 milliseconds)
        setTimeout(hideMessage, 3000);
    </script>
            <div class='bulletinadd'>
                <h1 style='font-family: Arial, Helvetica, sans-serif;'>Add to Bulletin Board</h1>
                <form action='' method='post' class='add-form'>
                    <input type='hidden' name='admin_id' value="<?php echo htmlspecialchars($admin_id); ?>">
                    <label for=''>Content:</label>
                    <div class='flex'>
                        <div class='addbox'>
                            <input type='textarea' rows='4' cols='50' name='bb_content' id='' placeholder='Enter Content...' required>
                        </div>
                        <div class='date'><input type='date' name='publishedDate'></div><br>
                        <div class='submit-button'>
                            <input type='submit' name='submit' value='Submit'>
                        </div>
                    </div>
                </form>
            </div>

            <div class='bulletinview'>
                <h1 style='font-family: Arial, Helvetica, sans-serif;'>View Bulletin Board</h1>
                <table>
                    <tr>
                        <th>Sl no</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $stmt = $conn->prepare('SELECT * FROM bulletin_board ORDER BY b_id DESC');
                    $stmt->execute();
                    $info = $stmt->get_result();

                    $count = 0;

                    while ($bb_info = mysqli_fetch_assoc($info)) {
                        $count++;

                        if ($count <= 5) {
                    ?>
                            <tr>
                                <td style='font-weight:700; color:black;'><?php echo $bb_info['b_id'] ?></td>
                                <td><?php echo $bb_info['content'] ?></td>
                                <td><?php echo $bb_info['published_date'] ?></td>
                                <td>
                                    <input type="hidden" class="delete_id_value" value="<?php echo $bb_info['b_id']; ?>">
                                    <a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax'>Delete</button></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>


            <div class="bulletinview">
                <h1 style='font-family: Arial, Helvetica, sans-serif;'>All Bulletin Board Posts</h1>

                <table>
                    <tr>
                        <th>Sl no</th>
                        <th>Content</th>
                        <th>Publish Date</th>
                        <th>Delete</th>
                    </tr>
                    <?php

                    $stmt = $conn->prepare('SELECT * FROM bulletin_board ORDER BY b_id DESC');
                    $stmt->execute();

                    $info = $stmt->get_result();

                    while ($bb_info = mysqli_fetch_assoc($info)) {

                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $bb_info['b_id'] ?></td>
                            <td><?php echo $bb_info['content'] ?></td>
                            <td><?php echo $bb_info['published_date'] ?></td>
                            <<td><input type="hidden" class="delete_id_value" value="<?php echo $bb_info['b_id']; ?>">
                                <a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax ' id="delete">Delete</button></a></td>
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
                        text: "Once deleted, you will not be able to recover this Headline!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type: "POST",
                                url: "admin_dashboard_bulletinBoard.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    if (data.status == "success") {

                                        swal("Success", "The Bulletin Point has been deleted successfully!", "success").then(() => {
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
    .bulletinview {
        border: solid 1.5px;
        margin: 70px auto auto 70px;
        padding: 50px;
        width: 70vw;
    }

    .bulletinadd {
        border: solid 1.5px;
        margin: 0px auto auto 70px;
        padding: 50px;
        width: 70vw;
    }


    .add-form {
        margin-top: 30px;
        width: 55vw;
    }

    .add-form label {
        font-size: 30;
        font-family: Arial, Helvetica, sans-serif;
    }

    .add-form .addbox input {
        margin-top: 10px;
        width: 40vw;
        height: 40px;
        border: solid 1.7px;
        font-size: large;
        background-color: transparent;
    }

    .date input {
        border: solid 2px;
        width: 150px;
        height: 40px;
        margin: auto 15px;
        font-size: large;
        margin-top: 10px;
    }

    .submit-button input {
        margin-top: 10px;
        background-color: rgb(60, 139, 244);
        width: 80px;
        height: 40px;
        border-radius: 5px;
        font-size: large;
        cursor: pointer;
        color: White;
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
