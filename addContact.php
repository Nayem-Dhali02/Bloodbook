<?php
include_once __dir__.'/includes/header.php';

if (empty($_SESSION['uID'])) {
header("location: signIn.php");
die("You are not logged in!");
}
$lid=$_SESSION['uID'];

$link = mysqli_connect( 'localhost', 'root', '', 'myphonebook' );

if ( !empty( $_POST ) ) {
    $name = $_POST['name'];
    $mobile = $_POST['phone'];
    echo '<pre>';
    print_r( $_POST );

    $query = "INSERT INTO pb_contact(c_name, c_phone,u_id) VALUES ('$name', '$mobile', '$lid')";
    $res = mysqli_query( $link, $query );

    print_r( $res );

    if ( $res ) {
        header( 'Location: index.php' );
    } else {
        echo "Failed.";

    }

}
?>


        <!-- main -->
    <div class="main-w3layouts wrapper" action = "" method = "post">
        <h2>Sign In Form</h2>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="" method="post">
                    <input class="text email" type="text" name="name" placeholder="Name" required="">
                    <input class="text" type="text" name="phone" placeholder="Phone" required="">
                    <div class="wthree-text">
                      
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="Add Contact">
                </form>
                <p><a href = "logout.php">Logout</a></p>
            </div>
        </div>




<!-- <form action = "" method = "post">

<table>
<tr><td> Name: </td> <td><input type = "text" name = "name"></td></tr>
<tr><td> Mobile: </td> <td><input type = "text" name = "phone"></td></tr>
<tr> <td></td>
<td><input type = "submit" name = "" value = "Add Contact"></td></tr>
</table>

<p><a href = "logout.php">Logout</a></p>
</form> -->

<?php
include_once __dir__.'/includes/footer.php';
?>
