<html>
<head>
<title>My News Web Site</title>
</head>
<body>
<div align="center">
<div align="center" style="padding:25px;color:blue;border:solid brown 3px;width:800px;">
Al SaChaMa News Service
</div></div>


	</table>



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

$sql = "SELECT id,body,heading FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<br><table style="padding-top:50px;">';
    while($row = $result->fetch_assoc()) {
		
	echo '	<tr style="border:solid gray 2px;"><td width="15%" rowspan="2"><h1 style="font-size="300%">'.$row['id'].'<td> <h2>'. $row['heading'].' </h2></td></tr>';
	echo '<tr>								<td><h4>'.$row['body'].'	</td></tr>';	
	
	
	


	}
} else {
    echo '<tr><td colspan="7" align="center"> No results</td></tr>';
}

$conn->close();
?>

	