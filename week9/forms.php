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


	<?php
		// define variables and set to empty values
	$nameErr = $emailErr = $genderErr = $websiteErr = "";
	$name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
				// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
				// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		if (empty($_POST["website"])) {
			$website = "";
		} else {
			$website = test_input($_POST["website"]);
				// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
				$websiteErr = "Invalid URL";
			}
		}

		if (empty($_POST["comment"])) {
			$comment = "";
		} else {
			$comment = test_input($_POST["comment"]);
		}

		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<div class="header2">
		<h2>Guest Form</h2>
	</div>

	<div class="subcontent">
		<p>If you want to see the entries, click<a href="guests.php"> HERE.</a></p>
		<p><span class="error">* required field</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			Name: <input type="text" name="name" value="<?php echo $name;?>">
			<span class="error">* <?php echo $nameErr;?></span>
			<br><br>
			E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			<span class="error">* <?php echo $emailErr;?></span>
			<br><br>
			Website: <input type="text" name="website" value="<?php echo $website;?>">
			<span class="error"><?php echo $websiteErr;?></span>
			<br><br>
			Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
			<br><br>
			Gender:
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
			<span class="error">* <?php echo $genderErr;?></span>
			<br><br>
			<input type="submit" name="submit" value="Submit">  
		</form>


		<?php
		echo "<h2>Your Input:</h2>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $website;
		echo "<br>";
		echo $comment;
		echo "<br>";
		echo $gender;
		?>

		<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{

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

			// sql to create table
			$table = "CREATE TABLE IF NOT EXISTS aclopez_myguests (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL,
			email VARCHAR(50),
			website VARCHAR(150),
			comment TEXT,
			gender VARCHAR(10),
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";

			$table = "INSERT INTO aclopez_myguests (name, email, website, comment, gender)
			VALUES ('$name', '$email', '$website', '$comment', '$gender')";

			if ($conn->query($table) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $table . "<br>" . $conn->error;
			}

			$conn->close();
		}
		?>
	</div>
</body>
</html>