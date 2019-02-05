<?php
// SJD_get_DB
$servername = "localhost";
$username = "root";
$password = "Group4";
$dbname = "userdb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

//*******once you create the database you dont need these commands anymore*********
// Create database
//$sql = "CREATE DATABASE myDB";
/*if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/
$sql = "CREATE TABLE UserInfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
userID INT(50),
skills VARCHAR(30),
skillProf INT(10)
)"; 



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (isset($_POST['SubmitBT']))
	{
    // collect value of input fields
	// get first name
	$firstname1 = htmlspecialchars($_REQUEST['firstname']);
    if (empty($firstname1)) 
	{
        echo "firstname is empty";
	}
	// get last name
	$lastname = htmlspecialchars($_REQUEST['lastname']);
    if (empty($lastname)) 
	{
        echo "lastname is empty";
	}
	// get user ID
	$userid = htmlspecialchars($_REQUEST['userid']);
    if (empty($userid)) 
	{
        echo "userid is empty";
	}
	// get skill
	$skill = htmlspecialchars($_REQUEST['skill']);
    if (empty($skill)) 
	{
        echo "skill is empty";
	}
	// get skill proficiency
	$skillpro = htmlspecialchars($_REQUEST['skillpro']);
    if (empty($skill)) 
	{
        echo "skillpro is empty";
	}
	if ($skillpro > 10 || $skillpro < 1)
	{
		echo "skillpro violates legal range of values";
	}
	

	$sql = "INSERT INTO userinfo (id, firstname, lastname, userID, skills, skillProf)
	VALUES ('0', '$firstname1', '$lastname', '$userid', '$skill', '$skillpro')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
$conn->close();
}

	elseif ( isset($_POST['ChangeBT']) )   {
	echo "this will edit the user.";
  } elseif ( isset($_POST['DeleteBT']) )   {
    //change every letter to a different colour
	echo "this will delete the user.";
  } else   {
    //nothing to do here, just nice to have a comment letting you know
  }
}







?>
