<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "semtest";

$uid=$_POST['uid'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM employee WHERE uid=$uid";

if ($conn->query($sql) === TRUE) {
    echo '<scrpt>alert("Record deleted successfully");  </script>';
	echo '<script>window.location.href="user.php";</script>';
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
