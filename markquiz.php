<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset= "utf-8" />
	<meta name= "description" content= "Share the results of the quiz" />
	<meta name= "keywords" content= "TCP/IP" />
	<meta name= "author" content= "James McKenna" />
	<title>TCP/IP - Results</title>
	<link href= "styles/styles.css" rel= "stylesheet" />
</head>

<body>

	<div>
		<ul class="nav" >
			<?php include 'menu.inc'; ?>
		</ul>
	</div>
	
	<header>
		<?php include 'header.inc'; ?>
	</header>
	
	<article>
		<h2>Results</h2>
		<p id="instruct">Here are your results from the quiz</p>
		<br />
		
<?php
	$attempt = 0;
	$score = 0;
	$date = date("Y-m-d H:m:s");
	$err = false;
	
	if(isset($_POST["Q1"])) {
		$A1 = $_POST["Q1"];
		if($A1 == "Transmission Control Protocol") { $score+=1; }
	}
	
	if(isset($_POST["Q2"])) {
		$A2 = $_POST["Q2"];
		if($A2 == "IETF") { $score+=1; }
	}
	
	if(isset($_POST["Q3"])) {
		$A3 = $_POST["Q3"];
		if($A3 == "4 layers") { $score+=1; }
	}
	
	if(isset($_POST["Q4"])) {
		$A4 = $_POST["Q4"];
		if($A4 == "John Postel") { $score+=1; }
	}
	
	$A5 = "";
	if(isset($_POST["interface"])) { $A5 += "n"; }
	if(isset($_POST["presentaion"])) { $A5 += "y"; }
	if(isset($_POST["connection"])) { $A5 += "n"; }
	if(isset($_POST["session"])) { $A5 += "y"; }
	if(isset($_POST["transport"])) { $A5 += "y"; }
	if($A5 == "yyy") { $score+=1; }
	
	
	if(isset($_POST["fname"])) {
		$firstname = $_POST["fname"];
		if($firstname == "" || !preg_match("/^[a-zA-Z \-]*$/",$firstname)) { 
			echo "<p>Error: You have not entered a first name correctly</p>";
			$err = true;
		}
	} else {
		echo "<p>Error: Enter your first name in the <a href=\"quiz.html\">quiz</a></p>";
		$err = true;
	}
	
	if(isset($_POST["lname"])) {
		$lastname = $_POST["lname"];
		if($lastname == "" || !preg_match("/^[a-zA-Z \-]*$/",$lastname)) { 
			echo "<p>Error: You have not entered a last name correctly</p>";
			$err = true;
		}
	} else {
		echo "<p>Error: Enter your last name in the <a href=\"quiz.html\">quiz</a></p>";
		$err = true;
	}
	
	if(isset($_POST["ID"])) {
		$studentid = $_POST["ID"];
		if($studentid == "") { 
			echo "<p>Error: You have not entered an ID number</p>" ;
			$err = true;
		}
	} else {
		echo "<p>Error: Enter your student ID in the <a href=\"quiz.html\">quiz</a></p>";
		$err = true;
	}
	
	$grade = $score / 5 * 100;
	if($grade == 0) { 
		echo "<p>Error: You have not answered any questions correctly</p>";
		$err = true; 
	}
	
	require_once ("access.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);	

	if(!$conn) {
		echo "<p>Database connection failed</p>";
	} else {
		$sql_table = "attempts";
		$query = "select * from attempts where StudentID like '$studentid'";
		$result1 = mysqli_query($conn, $query);
		if(!$result1) {
			echo "<p>Error: Something whet wrong with query</p>";
			$err = true;
		} elseif ($result1 == true){
			while ($row = mysqli_fetch_assoc($result1)) {
				if ($attempt < $row["AttemptNo"]) { $attempt = $row["AttemptNo"]; }
			}
			if ($attempt >= 3) {
				echo "<p>Error: Used up 3 attempts</p>";
				$err = true;
			} else {
				if ($err == false) {
					$attempt += 1;
					$query = "insert into $sql_table (Date, FirstName, LastName, StudentID, AttemptNo, Score) values ('$date', '$firstname', '$lastname', '$studentid', '$attempt', '$grade')";
					$result2 = mysqli_query($conn, $query);
				}
			}
		} else {
			if ($err == false) {
				$attempt = 1;
				$query = "insert into $sql_table (Date, FirstName, LastName, StudentID, AttemptNo, Score) values ('$date', '$firstname', '$lastname', '$studentid', '$attempt', '$grade')";
				$result2 = mysqli_query($conn, $query);
			}
		}
		mysqli_close($conn);
	}
	
	
	if($err == false) {
		echo "<p id='grade'><strong>Score: $grade%</strong></p>";
		echo "<p>Name: $firstname $lastname</p>";
		echo "<p>Student ID: $studentid</p>";
		echo "<p>Attempt No#$attempt</p>";
		echo "<br />";
		if($attempt < 3) {
			echo "<p id='retry'>Want another shot? Click <a href='quiz.php'>here</a> to retry!</p>";
		} else {
			echo "<p id='retry'>You have used your last attempt</p>";
		}
	} else { echo "<p>An error has occured. Please fill out the <a href='quiz.php'>quiz</a> and try again.</p>"; }
?>
	</article>
	
	<footer>
		<?php include 'footer.inc'; ?>
	</footer>
	
</body>
</html>