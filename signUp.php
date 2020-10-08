<?php
include_once __dir__.'/includes/header.php';

$link = mysqli_connect( 'localhost', 'root', '', 'myphonebook' );

if(!empty($_POST))
{
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$conpass = $_POST['conpass'];
    
    if ($password == $conpass){
        $query = "INSERT INTO pb_user(u_name, u_email, u_password) VALUES ('$name', '$email', '$password')";
        
        $res = mysqli_query($link,$query);
        
    }else{
        echo "password doesn't match";
    }
    if($res){
        echo "Registration Successful.";
    }else{
        echo "Registration Fsiled.";
    }
    
 }


?>

    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h2>Creative SignUp Form</h2>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="" method="post">
                    <input class="text" type="text" name="name" placeholder="Username" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="password" name="pass" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="conpass" placeholder="Confirm Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="SIGNUP">
                </form>
                <p>Don't have an Account? <a href="signIn.php">Sign In</a></p>
            </div>
        </div>



<?php
include_once __dir__.'/includes/footer.php';
?>
