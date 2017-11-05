<?php
session_start();
$id = ($_SESSION['id']);
$servername = "localhost";
$username = "root";
$password = "kkp123";
$dbname = "accounts";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, name, gender, email, username, dob FROM users WHERE id = $id";
$result = $conn->query($sql);
    echo "<table><tr><th>Id</th><th>Named</th><th>Gender</th><th>Email</th><th>Username</th><th>Born</th></tr>";
    // output data of each row
    $row = $result->fetch_assoc();
    echo "<tr><td>".$row["id"].
    "</th><td>". $row["name"].
    "</th><td>". $row["gender"].
    "</th><td> ".$row["email"].
    "</th><td> ".$row["username"].
    "</th><td> ".$row["dob"]."</td></tr>";
    
    echo "</table>";
$conn->close();
?>
<!doctype html>
<html>
	<head>
	</head>
	<body>

			<form method="post">
				<p><a href="changepassword.php">Change Password</a></p>
				<p><a href="changeName.php">Change Name</a></p>
				<p><a href="changeEmail.php">Change Email</a></p>
				<p><a href="changeGender.php">Change Gender</a></p>
				<p><a href="changeDate.php">Change Date</a></p>

				
			</form>
	</body>
</html>
