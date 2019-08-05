<?php
session_start();

?>
<head>
<script>
	function redirect(p1)
		{
			if(p1==0){window.location.href="login.php"}
				else 
					if(p1==1)
					{
						window.location.href="user.php"
					}
					else
						if(p1==2)
						{
							window.location.href="user.php"
						}
		}

</script>
</head>
<?php
$uname = $_POST['uname'];
$pass = $_POST['pass'];

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

$sql = "SELECT password,type FROM employee where username='".$uname ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($pass==$row["password"])
		{
			$_SESSION['UNAME']=$uname;
			$_SESSION['UTYPE']=$row['type'];
			if($row["type"]=="user")
			{
				$utype=1;
			}
			else if ($row["type"]=="admin")
			{
				$utype=2;
			}
				echo '<body><script>redirect('.$utype.');</script>';
				
				
		}
		
    }
} else {
    echo '<body><script>redirect(0);</script>';
}
$conn->close();
?>
