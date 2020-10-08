<?php
include_once __dir__.'/includes/header.php';


if (empty($_SESSION['uID'])) {
header("location: signIn.php");
die("You are not logged in!");
}
$link = mysqli_connect( 'localhost', 'root', '', 'myphonebook' );
//print_r($_GET);
if(!empty($_GET)){
    $cId = $_GET['id'];
    echo $cId;            
    $query ="SELECT * FROM pb_contact WHERE c_id='$cId'";
    $res = mysqli_query( $link, $query );    
    $data = mysqli_fetch_assoc( $res);
/*echo '<pre>';
print_r( $data );*/   
    
}

print_r( $_POST );

if(!empty($_POST))
{
$name = $_POST['name'];
$phone = $_POST['phone'];
    
        $query = "UPDATE pb_contact SET c_name ='$name', c_phone='$phone' WHERE c_id='$cId'";        
        $res = mysqli_query($link,$query);
    
    echo '<pre>';
print_r($res);    
        if ( $res ) {
        header( 'Location: index.php' );
    } else {
        echo "Failed.".mysqli_error($link);

    }       

 }
    
?>

<form action="" method="post">

 <table>
<tr><td> Name: </td> <td><input type="text" name="name" value="<?php echo $data['c_name']?>"></td></tr>
<tr><td> Mobile: </td> <td><input type="text" name="phone" value="<?php echo $data['c_phone']?>"></td> </tr>
<tr> <td></td>
 <td><input type="submit" name="" value="Update "></td></tr>
</table>

<p><a href="logout.php">Logout</a></p>
</form>


<?php
include_once __dir__.'/includes/footer.php';
?>