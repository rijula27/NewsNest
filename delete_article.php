

<!-- DEPRICATED PAGE -->


<?php
include( 'dbconnection.php' );

if ( isset( $_POST[ 'delete_btn_set' ] ) && isset( $_POST[ 'delete_id' ] ) ) {
    $user_id = $_POST[ 'delete_id' ];

    // Perform the deletion query
    $delete_query = "DELETE FROM user_account WHERE user_id = '$user_id'";
    $result = mysqli_query( $conn, $delete_query );

    if ( $result ) {
        // Deletion successful
        echo json_encode( array( 'status' => 'success', 'message' => 'User Account deleted successfully' ) );
        exit();
    } else {
        // Deletion failed
        echo json_encode( array( 'status' => 'error', 'message' => 'Failed to delete User Account' ) );
        exit();
    }
} else {
    // Invalid request
    echo json_encode( array( 'status' => 'error', 'message' => 'Invalid request' ) );
    exit();
}
?>
