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
$userID= $_POST['uid'];

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

$sql = "SELECT uid,name,username,email,type FROM employee where uid=".$userID;
$result = $conn->query($sql);
    echo '<div align="center" width="100%"><h1>Edit User Data</h1></div>';
	echo '<div align="center"><div align="left">';
if ($result->num_rows > 0) {
echo '<form action="update.php" method="POST">';
    while($row = $result->fetch_assoc()) {
		echo '<input type="hidden" name="updateuid" value="'.$row['uid'].'"><br>';
		echo '<span> Name : </span> <input type="text" name="updateName" value="'.$row['name'].'"><br>';
		echo '<span> Username : </span> <input type="text" name="updateUName" value="'.$row['username'].'"><br>';
		echo '<span> Email : </span> <input type="text" name="updateEmail" value="'.$row['email'].'"><br>';
		echo '<span> type : </span> <select name="updateType"><option value="admin">Administrator</option><option value="user">User</option></select>';
		}
		echo '<br><input type="submit" value="Update"> <input type="reset" value="Reset"> </form>';
} else {
    echo "0 results";
}
echo '</div>';
echo '</div>';
$conn->close();
?>