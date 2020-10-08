<?php session_start();

if ( empty( $_SESSION['uID'] ) ) {
    header( "location: signIn.php" );
    die( "You are not logged in!" );
}

$link = mysqli_connect( 'localhost', 'root', '', 'myphonebook' );

if ( !empty( $_GET ) ) {

    $cId = $_GET['id'];
  

    $query = "DELETE FROM pb_contact WHERE c_id='$cId'";
    $res = mysqli_query( $link, $query );

    if ( $res ) {
        header( 'Location: index.php' );
    } else {
        echo "Failed.".mysqli_error( $link );

    }

}

?>