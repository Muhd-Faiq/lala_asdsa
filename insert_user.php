<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) {


	     $userName = $_POST["userName"];
	     $userPassword = $_POST["userPassword"];
	     $userLevel = $_POST["userLevel"];


		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "INSERT INTO user(username,password,level) VALUES ('$userName','$userPassword','$userLevel')" ;

		 if (mysqli_query($conn, $sql)) {
			echo "<h3>New record created successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}


	     mysqli_close($conn);
		echo "<div class='topnav'>";
		 echo "<p><a href='user_form.php'>Click here to insert again</a></p>";
		 echo "<p><a href='view_user_database.php'>Click here to view updated list</a></p>";
		 echo "</div>";
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }

  ?>
