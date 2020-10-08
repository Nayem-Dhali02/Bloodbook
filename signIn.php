<?php
include_once __dir__.'/includes/header.php';

$link = mysqli_connect( 'localhost', 'root', '', 'myphonebook' );


if ( !empty( $_POST ) ) {
    $email = $_POST['email'];
    $password = $_POST['pass'];


    $query = "SELECT * FROM pb_user WHERE u_email='$email'";
    $res = mysqli_query( $link, $query );


    $data = mysqli_fetch_assoc( $res );

    print_r( $data );

        if ( $password == $data['u_password'] ) {
           $_SESSION['uID'] = $data['u_id'];
$_SESSION['uEmail'] = $data['u_email'];
            header( 'Location: index.php' );
        } 
        else {
            echo "Wrong Password";
        }

}

?>

<!-- <form action = "" method = "post"> -->


        <!-- main -->
    <div class="main-w3layouts wrapper" action = "" method = "post">
        <h2>Sign In Form</h2>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="#" method="post">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="password" name="pass" placeholder="Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="SIGNUP">
                </form>
                <p>Don't have an account? <a href="signUp.php">Sign up</a></p>
            </div>
        </div>




<!-- <table>

<tr>
<td> Email: </td>    <td><input type = "email" name = "email"></td>
</tr>
<tr>
<td>Password: </td>    <td><input type = "password" name = "pass"></td>
</tr>
<tr>
<td></td>    <td><input type = "submit" name = "" value = "Login"></td>
</tr>

</table>

</form>
 -->



<?php
include_once __dir__.'/includes/footer.php';
?>