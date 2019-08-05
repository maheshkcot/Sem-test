<?php
session_start();




    echo '<div align="center" width="100%"><h1>Add New User</h1></div>';
	echo '<div align="center"><div align="left" width="200px">';

echo '<form action="addnew.php" method="POST">';

		echo '<span> Name : </span> <input type="text" name="addName" value=""><br>';
		echo '<span> Username : </span> <input type="text" name="addUName" value=""><br>';
		echo '<span> Password : </span> <input type="password" name="addPass" value=""><br>';
		echo '<span> Email : </span> <input type="text" name="addEmail" value=""><br>';
		echo '<span> type : </span> <select name="addType"><option value="admin">Administrator</option><option value="user">User</option></select>';

		echo '<br><input type="submit" value="Add"> <input type="reset" value="Reset"> </form>';

echo '</div>';
echo '</div>';

?>