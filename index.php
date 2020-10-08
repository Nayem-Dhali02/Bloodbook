<?php
include_once __dir__.'/includes/header.php';

if (empty($_SESSION['uID'])) {
header("location: signIn.php");
die("You are not logged in!");
}
$lid=$_SESSION['uID'];

$link = mysqli_connect( 'localhost', 'root', '', 'myphonebook' );
?>

<div class="tabeleC">
    <table id="customers">
        <tr>
            <th>SL.</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>

        <?php
$q = "SELECT * FROM pb_contact WHERE u_id='$lid'";
$r = mysqli_query( $link, $q );
    $sl=1;
$data = mysqli_fetch_all( $r, MYSQLI_ASSOC );


foreach ($data as $d) {
    ?>
        <tr>
            <td><?php echo $sl++ ?></td>
            <td> <?php echo $d['c_name'] ?> </td>
            <td> <?php echo $d['c_phone'] ?> </td>
            <td> <a href="editContact.php?id= <?php echo $d['c_id']?>">Edit</a> |
                <a onclick="return confirm('Are you sure to delete?')" href="deletedContact.php?id= <?php echo $d['c_id']?>">Delete</a>
            </td>
        </tr>
        <?php }
    ?>
    </table> 


    <div class="butt">
    <p><a href="addContact.php">Add New Contact</a></p>
    <p><a href="logout.php">Logout</a></p> 
</div>
</div>


<?php
    include_once __dir__.'/includes/footer.php';
    ?>
