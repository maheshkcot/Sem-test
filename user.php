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

?>
<html>
<heaD>

<title> <?php echo $_SESSION['UNAME']; ?> - Dashboard</title>
</head>

<body align="center">
<div align="right"><a href="logout.php"><button type="button">logout</button></a>
</div>
<div align="center">
<h2 style="padding:20px;font-style:bold">
Welcome <?php echo $_SESSION['UNAME']; 	?>! 
</h2>
</div>
<?php
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

$sql = "SELECT uid,name,username,email,type FROM employee";
$result = $conn->query($sql);
echo '<div align="center" width="100%"><table class="mytable" width="100%">';
echo '<thead><tr>';
echo '<td>User ID</td><td>Name</td><td>User Name</td><td>E-Mail</td><td>User Type</td>';
if($_SESSION['UTYPE']=='admin')
{
	echo '<td>Edit</td>';
	echo '<td>Delete</td>';
}
echo '</tr></thead>';


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		echo "<tbody><tr><td>".$row['uid']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['type']."</td>";
		if($_SESSION['UTYPE']=='admin')
{
	echo '<td><form action="edit.php" method="POST"><input type="hidden" value="'.$row['uid'].'" name="uid"><input type="submit" value="Edit"></form></td>';
	echo '<td><form action="delete.php" method="POST"><input type="hidden" value="'.$row['uid'].'" name="uid"><input type="submit" value="Delete"></form></td>';
}
echo '</tr></tbody>';
	}
} else {
    echo '<tr><td colspan="7" align="center"> No results</td></tr>';
}
echo '</table></div>';
if($_SESSION['UTYPE']=='admin')
{
	echo '<div width="60%" align="center">';
	echo '<span width="30px" align="center"><a href="adduser.php"><button type="button">Add New</button></span>';
	echo '</div>';
		
	
	
}
$conn->close();
?>

