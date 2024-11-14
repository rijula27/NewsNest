<?php
include( 'dbconnection.php' );

if ( isset( $_POST[ 'submit' ] ) ) {
    $img_name = $_FILES[ 'img_upload' ][ 'name' ];

    $tmp_img_name = $_FILES[ 'img_upload' ][ 'tmp_name' ];

    $folder = 'Assets/image/'.$img_name;
    // move_uploaded_file( $tmp_img_name, $folder.$img_name );

    $stmt = mysqli_query( $conn, "INSERT INTO image (image) VALUES ('$img_name')" );
    if ( move_uploaded_file( $tmp_img_name, $folder ) ) {
        echo ' <h2> File uploaded succesfully</h2>';
    } else {
        echo '<h2>File not uploaded</h2>';
    }
}

?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>image test</title>
</head>
<body>
<form action = '' method = 'POST' enctype = 'multipart/form-data'>
<input type = 'text' placeholder = 'image name' name = 'image_name'>
<input type = 'file' accept = '.jpg,.jpeg,.png,/.gif' name = 'img_upload'>
<button type = 'submit' name = 'submit'>Submit</button>
</form>

<!-- <div>
<?php
$res = mysqli_query( $conn, 'SELECT * FROM image' );
while( $row = mysqli_fetch_assoc( $res ) ) {
    ?>
    img src = "Assets/image/<?php echo $row['image'] ?>" alt = ''>
    <?php }
    ?>

    </div> -->
    </body>
    </html>

    <!-- Admin Dashboard template html -->
    <!-- <!DOCTYPE html>
    <html lang = 'en'>
    <head>
    <meta charset = 'UTF-8' />
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0' />
    <script
    src = 'https://kit.fontawesome.com/3d8df9be04.js'
    crossorigin = 'anonymous'
    ></script>
    <link rel = 'stylesheet' href = 'admin_dashboard.css' />
    <title>Document</title>
    </head>
    <body>
    <div class = 'navbar'>
    <div class = 'flex navbar_item'>
    <a href = ''><img src = 'logo.png' alt = '' /></a>
    <div class = 'flex'>
    <h2>Admin Name</h2>
    <a href = '' id = 'profile_picture'
    ><img src = 'Kaustav dp.jpg' alt = 'img'
    /></a>
    </div>
    </div>
    </div>
    <div class = 'flex'>
    <div class = 'sidebar'>
    <h2 class = 'underline'>Dashboard</h2>
    <ul class = 'sidebar_menu'>
    <li id = 'select_tab'><a href = ''> User</a></li>
    <hr />
    <li><a href = ''> Bulletin Board</a></li>
    <hr />
    <li><a href = ''> News</a></li>
    <hr />
    <li><a href = ''> Article</a></li>
    <hr />
    </ul>
    <div class = 'logout'>
    <a href = ''><button id = 'logout'>Log Out</button></a>
    </div>
    </div>

    <div class = 'content'></div>
    </div>
    </body>
    </html> -->
