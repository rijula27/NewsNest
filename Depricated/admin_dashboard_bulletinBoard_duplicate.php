<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->
<!-- DEPRICATED -->








<?php

session_start();



include( 'dbconnection.php' );


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ( isset( $_POST[ 'bb_content' ] ) && isset( $_POST[ 'publishedDate' ] ) ) {
    // if(isset($_POST['form_submission'])){
    // Disable foreign key checks
    $conn->query( 'SET FOREIGN_KEY_CHECKS=0;' );

    // Prepare and bind SQL statements
    $stmt1 = $conn->prepare( 'INSERT INTO bulletin_board (content, published_date, admin_id) VALUES (?, ?, ?)' );
    $stmt1->bind_param( 'ssi', $body, $publishedDate, $adminId );

    // Set parameters and execute for news
    $body = $_POST[ 'bb_content' ];
    $publishedDate = $_POST[ 'publishedDate' ];
    $adminId = $_POST[ 'userId' ];

    // Execute the statement
    // if(
        $stmt1->execute();
    // ){
    //     header( 'Location: admin_dashboard_bulletinBoard.php' );

    // }

    // Close statements and database connection
    $stmt1->close();

    // Enable foreign key checks
    $conn->query( 'SET FOREIGN_KEY_CHECKS=1;' );

    }else{

    // $delete = false;

    // Check if the delete button set and delete id are set in the POST data
    if (isset($_POST['delete_btn_set']) && isset($_POST['delete_id'])) {
        $b_id = $_POST['delete_id'];

        // Perform the deletion query
        $delete_query = "DELETE FROM bulletin_board WHERE b_id = '$b_id'";
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
}

$message = isset( $_GET[ 'message' ] ) ? $_GET[ 'message' ] : '';

$userId = isset( $_GET[ 'userId' ] ) ? $_GET[ 'userId' ] : '';

$adminName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name']:'';

?>

<html lang = 'en'>
<head>
<meta charset = 'UTF-8' />
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0' />
<script
src = 'https://kit.fontawesome.com/3d8df9be04.js'
crossorigin = 'anonymous'
></script>
<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src = 'https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<link rel = 'stylesheet' href = 'Assets/style/admin_dashboard.css' />
<title>Document</title>
</head>
<body>

<?php

?>
<div class = 'navbar'>
<div class = 'flex navbar_item'>
<a href = 'index.php'><img src = 'logo.png' alt = '' /></a>
<div class = 'flex'>
<!-- <h2>Admin Name</h2>/ -->
<?php

echo '<a href="#" class="user_name">' . htmlspecialchars( $adminName ) . '</a>';
// echo '<a href="#" class="user_name">' . htmlspecialchars( $email ) . '</a>';
?>
<a href = '' id = 'profile_picture'
><img src = 'Kaustav dp.jpg' alt = 'img'
/></a>
</div>
</div>
</div>
<div class = 'flex'>
<div class = 'sidebar'>
<h2 class = ''>Dashboard</h2>
<ul class = 'sidebar_menu'>
<li ><a href = 'admin_dashboard_userView.php?message=<?php echo urlencode($message); ?> &userId=<?php echo urlencode($userId); ?>'> User</a></li>
<hr />
<li id = 'select_tab'><a href = ''> Bulletin Board</a></li>
<hr />
<li><a href = 'admin_dashboard_news.php?message=<?php echo urlencode($message); ?> &userId=<?php echo urlencode($userId); ?>'> News</a></li>
<hr />
<li><a href = "admin_dashboard_article.php?message=<?php echo urlencode($message); ?> &userId=<?php echo urlencode($userId); ?>">Article</a></li>
<hr />
</ul>
<div class = 'logout'>
<a href = ''><button id = 'logout'>Log Out</button></a>
</div>
</div>

<div class = 'content'>
<div class = 'bulletinadd'>
<h1 style = 'font-family: Arial, Helvetica, sans-serif;'>Add to Bulletin Board</h1>
<form action = '' method = 'post' class = 'add-form'>
    <!-- <input type="hidden" name='form_submission' value = 'true'> -->
<?php
// $userId = isset( $_GET[ 'userId' ] ) ? $_GET[ 'userId' ] : '';
?>
<input type = 'hidden' name = 'userId' value = "<?php echo htmlspecialchars($userId); ?>">
<label for = ''>Content:</label><br />
<div class = 'flex'>
<div class = 'addbox'>
<input
type = 'textarea'
rows = '4'
cols = '50'
name = 'bb_content'
id = ''
placeholder = 'Enter Content...'
required
/>
</div>
<div class = 'date'><input type = 'date' id = '' name = 'publishedDate'></div>
<br />
<div class = 'submit-button'>
<input type = 'submit' name = '' id = '' />
</div>
</div>
</form>
</div>

<div class = 'bulletinview'>
<h1 style = 'font-family: Arial, Helvetica, sans-serif;'>View Bulletin Board</h1>
<table>
<tr>
<th>Sl no</th>
<th>Content</th>
<th>Date</th>
<th>Action</th>
</tr>
<?php
$stmt = $conn->prepare( 'SELECT * FROM bulletin_board' );
$stmt->execute();

$info = $stmt->get_result();
// mysqli_data_seek( $info, 0 );
while( $bb_info = mysqli_fetch_assoc( $info ) ) {
    $u_id = $bb_info[ 'admin_id' ]
    ?>
    <tr>
    <td style = 'font-weight:700; color:black;'><?php echo $bb_info[ 'b_id' ] ?></td>
    <td><?php echo $bb_info[ 'content' ] ?></td>
    <td><?php echo $bb_info[ 'published_date' ] ?></td>
    <td><input type='hidden' class='delete_id_value' value="<?php echo $bb_info['b_id']; ?>">
    <a href = 'javascript:void(0)' ><button id='delete' class='delete_btn_ajax'>Delete</button></a></td>
    </tr>
    <?php
}
$stmt->close();
$conn->close();
?>
</table>
</div>
</div>
</div>

<script>
$(document).ready(function () {
        $('.delete_btn_ajax').click(function (e) { 
        e.preventDefault();
        var deleteid = $(this).closest("tr").find('.delete_id_value').val();
        // console.log(deleteid);
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
                success: function (response) {
                    var data = JSON.parse(response);
                        if (data.status == "success") {
                            // $(this).closest("tr").remove();
                            // Show success message
                            swal("Success", "The Headline has been deleted successfully!", "success").then(() => {
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
.bulletinadd,
.bulletinview {
    border: solid 1.5px;
    margin: 70px auto auto 70px;
    padding: 50px;
    /* background-color: rgb( 238, 238, 238 );
    */
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
    border:solid 2px;
    width: 150px;
    height: 40px;
    margin: auto 15px;
    font-size: large;
    margin-top: 10px;
}

.submit-button input {
    /* margin-right: 250px;
    */
    margin-top: 10px;

    background-color: rgb( 60, 139, 244 );
    width: 80px;
    height: 40px;
    border-radius: 5px;
    font-size: large;

    cursor: pointer;
    color:White;
    font-family: Arial, Helvetica, sans-serif;
}

table {
    /* border: 1px solid black;
    */
    width: 65vw;
    border-collapse: collapse;
    /* font-size: 1.25rem;
    */
}

th {
    border-top: 1px solid grey;
    border-bottom: 1px solid grey;
    /* width: 65vw;
    */
    padding: 10px;
    border-collapse: collapse;
    font-size: larger;
    font-weight: 900;
    font-family: Arial, Helvetica, sans-serif;
}

td {
    /* border: 1px solid black;
    */
    /* width: 65vw;
    */
    text-align: center;
    border-collapse: collapse;
    /* font-size: .75rem;
    */
    font-size: large;
    font-family: Arial, Helvetica, sans-serif;
    color:grey;

}

#delete {
    background-color: rgb( 245, 63, 35 );
    width: 80px;
    height: 40px;
    border-radius: 5px;
    font-size: large;
    margin: 10px;
    cursor: pointer;
    color:White;
    font-family: Arial, Helvetica, sans-serif;
}

table {
    margin-top: 30px;
}
</style>
</html>
