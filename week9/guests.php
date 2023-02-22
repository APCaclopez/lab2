<!DOCTYPE html>
<html>
<head>
	<title>AK</title>
	<link rel="icon" type="image/png" href="./images/crown_icon.png">
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap">
	<style>
		<?php include "index.css" ?>
	</style>
</head>

<body class="aboutbg">
	<header>
		<div class="container">

			<a href="index.html"><img src="./images/logo1.png" width="10%" height=auto class="logo"></a>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="forms.php">Forms</a></li>
					<li><a href="resources.php">Resources</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="header2">
		<h2>guest list</h2>
	</div>

	<div class="subcontent">
		<?php
		$servername = "192.168.150.213";
		$username = "webprogss211";
		$password = "fancyR!ce36";
		$dbname = "webprogss211";

// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, name, email, website, comment, gender FROM aclopez_myguests";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  // output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<li>id: " . $row["id"];
				echo "<ul>";
				echo "<li>" . "Name: " . $row["name"] . "</li>";
				echo "<li>" . "Email: " . $row["email"] . "</li>";
				echo "<li>" . "Website: " . $row["website"] . "</li>";
				echo "<li>" . "Comment: " . $row["comment"] . "</li>";
				echo "<li>" . "Gender: " . $row["gender"] . "</li>";
				echo "</ul>";
				echo "</li>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</div>

</body>
</html>