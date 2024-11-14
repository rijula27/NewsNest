<?php
session_start();
include('dbconnection.php');
$delete = false;

// Function to handle success messages
function setSuccessMessage($message) {
    $_SESSION['successMessage'] = $message;
    header("Location: admin_dashboard_userView.php");
    exit();
}

// Check if user_id is present in the URL
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Check if the user_id is from registration_form or user_account table

    $stmt = $conn->prepare("SELECT * FROM registration_form WHERE user_id = ?");
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $user_details = $stmt->get_result()->fetch_assoc();
    if ($user_details) {
        $user_name = $user_details['user_name'];
        $account_type = $user_details['account_type'];
        $email = $user_details['email'];
        $req_date = date('Y-m-d');
        $password = $user_details['password'];
        $hashedPassword = hash('sha256', $password);
        $img = $user_details['img'];

        if($account_type == 'admin'){
            $stmt2 = $conn->prepare('INSERT INTO admin_account2 (admin_id, admin_name, email, req_date, password,img) VALUES (?, ?, ?, ?, ?,?)');
            $stmt2->bind_param('isssss', $userId, $user_name, $email, $req_date, $hashedPassword,$img);
        }else{
            $stmt2 = $conn->prepare('INSERT INTO user_account (user_id, user_name, account_type, email, req_date, password,img) VALUES (?, ?, ?, ?, ?, ?,?)');
            $stmt2->bind_param('issssss', $userId, $user_name, $account_type, $email, $req_date, $hashedPassword,$img);
        }
        
        if ($stmt2->execute()) {
            // header("Location: admin_dashboard_userView.php?succesMessage=" . urlencode("Account has been aproved."));

            $stmt2->close();
            $stmt->close();
            $stmt3 = $conn->prepare("DELETE FROM registration_form WHERE user_id = ?");
            $stmt3->bind_param('i', $userId);
            $stmt3->execute();
            $stmt3->close();
            setSuccessMessage("Account has been approved.");
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_btn_set']) && isset($_POST['delete_id'])) {
        $user_id = $_POST['delete_id'];
        $table = $_POST['table'];

        if ($table === 'user_account') {
                // Disable foreign key checks and perform the deletion query
                // $delete_query = "SET foreign_key_checks = 0; DELETE FROM user_account WHERE user_id = ?"; 
            // Perform the deletion query
            // $conn->query('SET FOREIGN_KEY_CHECKS=0;');
            // $delete_query = "DELETE FROM user_account WHERE user_id = ?";
            // $conn->query('SET FOREIGN_KEY_CHECKS=1;');
            $conn->query('SET FOREIGN_KEY_CHECKS=0;');
            $delete_query = "DELETE FROM user_account WHERE user_id = ?";
            $stmt = $conn->prepare($delete_query);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $conn->query('SET FOREIGN_KEY_CHECKS=1;');
        } elseif ($table === 'registration_form') {
            $delete_query = "DELETE FROM registration_form WHERE user_id = ?";
        }elseif ($table === 'admin_account'){
            $conn->query('SET FOREIGN_KEY_CHECKS=0;');
            $delete_query = "DELETE FROM admin_account2 WHERE admin_id = ?";
            $stmt = $conn->prepare($delete_query);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $conn->query('SET FOREIGN_KEY_CHECKS=1;');
        }

        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param('i', $user_id);
        if ($stmt->execute()) {
            // Deletion successful
            echo json_encode(array('status' => 'success', 'message' => 'User Account deleted successfully'));
            exit();
        } else {
            // Deletion failed
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete User Account: ' . $conn->error));
            exit();
        }
        $stmt->close();
    } else {
        // Invalid request
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
        exit();
    }
}

// $message = isset($_GET['message']) ? $_GET['message'] : '';
$message = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : '';
unset($_SESSION['successMessage']); 
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

    <?php ?>

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
                <li id='select_tab'><a href=''><i class="fa-regular fa-user"></i>User</a></li>
                <hr />
                <li><a href="admin_dashboard_bulletinBoard.php"><i class="fa-solid fa-list"></i> Bulletin Board</a></li>
                <hr />
                <li><a href='admin_dashboard_news.php'><i class="fa-regular fa-newspaper"></i> News</a></li>
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
        <style>
        /* Define CSS styles for the success message */
        #message {
        padding: 20px;
    /* color: #0000ff; */
    color:green;
    margin: 20px auto 0;
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
            <!-- Content Here -->
            <div class='requestList'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>New Request</h1>
                <table>
                    <tr>
                        <th>User Id</th>
                        <th>Email</th>
                        <th>Request date</th>
                        <th>Accept</th>
                        <th>Account Type</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $stmt = $conn->prepare('SELECT * FROM registration_form');
                    $stmt->execute();
                    $details = $stmt->get_result();
                    while ($request_details = mysqli_fetch_assoc($details)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $request_details['user_id'] ?></td>
                            <td><?php echo $request_details['email'] ?></td>
                            <td><?php echo $request_details['req_date'] ?></td>
                            <td><?php echo $request_details['account_type']?></td>
                            <td><a href="admin_dashboard_userView.php?user_id=<?php echo $request_details['user_id'] ?>"><button id='approved'>Accept</button></a></td>
                            <td><input type="hidden" class="delete_id_value" value="<?php echo $request_details['user_id']; ?>"><a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax ' data-table="registration_form">Delete</button></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <hr class='hr' />

            <div class='requestList'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>All Admin</h1>
                <table>
                    <tr>
                        <th>Admin Id</th>
                        <th>Email</th>
                        <th>Approved date</th>
                        <!-- <th>Account Type</th> -->
                        <th>Delete</th>
                    </tr>

                    <?php
                    $stmt = $conn->prepare('SELECT * FROM admin_account2 ORDER BY req_date DESC');
                    $stmt->execute();
                    $info = $stmt->get_result();
                    while ($user_details = mysqli_fetch_assoc($info)) {
                        if (($user_details['email'] !== "rijulali674@gmail.com" && $user_details['email'] !== "thekaustav2020@gmail.com") && $user_details['email'] !== null) {  
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $user_details['admin_id'] ?></td>
                            <td><?php echo $user_details['email'] ?></td>
                            <td><?php echo $user_details['req_date'] ?></td>
                            <!-- <td><?php echo $user_details['account_type'] ?></td> -->
                            <td><input type="hidden" class="delete_id_value" value="<?php echo $user_details['admin_id']; ?>"><a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax ' data-table="admin_account">Delete</button></a></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <hr class='hr' />

            <div class='requestList'>
                <h1 class='' style='font-family: Arial, Helvetica, sans-serif;'>All User</h1>
                <table>
                    <tr>
                        <th>User Id</th>
                        <th>Email</th>
                        <th>Approved date</th>
                        <!-- <th>Account Type</th> -->
                        <th>Delete</th>
                    </tr>

                    <?php
                    $stmt = $conn->prepare('SELECT * FROM user_account ORDER BY req_date DESC');
                    $stmt->execute();
                    $info = $stmt->get_result();
                    while ($user_details = mysqli_fetch_assoc($info)) {
                    ?>
                        <tr>
                            <td style='font-weight:700; color:black;'><?php echo $user_details['user_id'] ?></td>
                            <td><?php echo $user_details['email'] ?></td>
                            <td><?php echo $user_details['req_date'] ?></td>
                            <!-- <td><?php echo $user_details['account_type'] ?></td> -->
                            <td><input type="hidden" class="delete_id_value" value="<?php echo $user_details['user_id']; ?>"><a href='javascript:void(0)'><button id="delete" class='delete_btn_ajax ' data-table="user_account">Delete</button></a></td>
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
                var table = $(this).data('table');
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
                                url: "admin_dashboard_userView.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                    "table": table
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    if (data.status == "success") {
                                        // Show success message
                                        swal("Success", "The User Id has been deleted successfully!", "success").then(() => {
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

    .requestList {
        margin: 0px auto auto 65px;
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
</style>

</html>
