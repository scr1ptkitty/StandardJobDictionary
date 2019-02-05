<?php
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

/*******once you create the database you dont need these commands anymore*********/
//Create database
/*$sql = "CREATE DATABASE employerdb";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}*/
$sql = "CREATE TABLE JobInfo (
title VARCHAR(30) PRIMARY KEY, 
degree VARCHAR(30), 
transport VARCHAR(3), 
remote VARCHAR(3), 
addr VARCHAR(30), 
stat VARCHAR(30), 
type VARCHAR(30), 
salary INT(6), 
task VARCHAR(30), 
skillreq VARCHAR(3), 
skillreqpro INT(10), 
langreq VARCHAR(30), 
langreqpro INT(10), 
summary VARCHAR(100)
)";

 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (isset($_POST['SubmitBT']))
	{
		$insert_jobtitle = htmlspecialchars($_REQUEST['jobtitle']);
		if (empty($insert_jobtitle)) 
		{
			echo "jobtitle is empty";
		}
		$insert_degree = htmlspecialchars($_REQUEST['degree']);
		if (empty($insert_degree)) 
		{
			echo "degree is empty";
		}
		$insert_transport = htmlspecialchars($_REQUEST['transport']);
		if (empty($insert_transport)) 
		{
			echo "transport is empty";
		}
		$insert_remote = htmlspecialchars($_REQUEST['remote']);
		if (empty($insert_remote)) 
		{
			echo "remote is empty";
		}
		$insert_workaddr = htmlspecialchars($_REQUEST['workaddress']);
		if (empty($insert_workaddr)) 
		{
			echo "workaddress is empty";
		}
		$insert_status = htmlspecialchars($_REQUEST['preferstatus']);
		if (empty($insert_status)) 
		{
			echo "preferstatus is empty";
		}
		$insert_jobtype = htmlspecialchars($_REQUEST['jobtype']);
		if (empty($insert_jobtype)) 
		{
			echo "jobtype is empty";
		}
		$insert_salary = htmlspecialchars($_REQUEST['salary']);
		if (empty($insert_salary)) 
		{
			echo "salary is empty";
		}
		$insert_task = htmlspecialchars($_REQUEST['task']);
		if (empty($insert_task)) 
		{
			echo "task is empty";
		}
		$insert_skillreq = htmlspecialchars($_REQUEST['skillreq']);
		if (empty($insert_skillreq)) 
		{
			echo "skillreq is empty";
		}
		$insert_skillreqpro = htmlspecialchars($_REQUEST['skillreqpro']);
		if (empty($insert_skillreqpro)) 
		{
			echo "skillreqpro is empty";
		}
		$insert_langreq = htmlspecialchars($_REQUEST['langreq']);
		if (empty($insert_langreq)) 
		{
			echo "langreq is empty";
		}
		$insert_langreqpro = htmlspecialchars($_REQUEST['langreqpro']);
		if (empty($insert_langreqpro)) 
		{
			echo "langreqpro is empty";
		}
		$insert_summary = htmlspecialchars($_REQUEST['summary']);
		if (empty($insert_summary)) 
		{
			echo "summary is empty";
		}
		
		$sql = "INSERT INTO jobinfo (title, degree, transport, remote, addr, stat, type, 
				salary, task, skillreq, skillreqpro, langreq, langreqpro, summary)
		VALUES ('0','$insert_jobtitle', '$insert_degree', '$insert_transport', '$insert_remote', '$insert_workaddr',
				'$insert_status','$insert_jobtype','$insert_salary','$insert_task','$insert_skillreq','$insert_skillreqpro',
				'$insert_langreq','$insert_langreqpro')";

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