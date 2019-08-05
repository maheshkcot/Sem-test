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

$name=$_POST['addName'];
$uname=$_POST['addUName'];
$email=$_POST['addEmail'];
$type=$_POST['addType'];
$pass=$_POST['addPass'];

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

$sql = "insert into employee (name,username,password,email,type) values('$name','$uname','$pass','$email','$type')";
if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.href="user.php";</script>';
} else {
    echo "Error Adding record: " . $conn->error;
}
$conn->close();
?>