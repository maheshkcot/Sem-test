<?php
session_start();
if($_SESSION['UTYPE'] == "admin" )
{}
else if ($_SESSION['UTYPE'] == "user" )
{}
else
{
	ECHO '<script>window.location.href="login.php";</script>';
}

$name=$_POST['updateName'];
$uname=$_POST['updateUName'];
$email=$_POST['updateEmail'];
$type=$_POST['updateType'];
$userID=$_POST['updateuid'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "semtest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "update employee set name='$name',username='$uname',email='$email',type='$type' where uid=".$userID;
if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.href="user.php";</script>';
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>