<!DOCTYPE html>
<html lang = "en" >
<head>
	<meta charset= "utf-8" />
	<meta name= "description" content= "Manage the results of the quiz" />
	<meta name="keywords" content= "TCP/IP" />
	<meta name= "author" content= "James McKenna" />
	<title>TCP/IP - Manage</title>
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
		<h2>Manage Quiz Results</h2>
		<p>Select how you would like to alter the quiz results</p>
	</article>
	
	<form id="change" method="get" action="manage.php" novalidate="novalidate">
	<fieldset id="manage">
	
		<?php
		if(isset($_GET["manage"])) {
		$manage = $_GET["manage"];
		} else { $manage = "ViewAll"; }
		
		require_once ("access.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		
		if(!$conn) {
		echo "<p>Database connection failed</p>";
		} else {
			$sql_table = "attempts";
			
			if($manage == "ViewAll") {
				$query = "SELECT * FROM attempts";
				
			} elseif ($manage == "ViewStudent") {
				if (isset($_GET["ViewStudentID"]) && isset($_GET["ViewStudentFName"])) {
					$studentid = $_GET["ViewStudentID"];
					$fname = $_GET["ViewStudentFName"];
					if ($fname != "" && $studentid != "") {
						$query = "SELECT * FROM attempts WHERE FisrtName LIKE '$fname' AND StudentID LIKE '$studentid'";
					} elseif ($fname != "") {
						$query = "SELECT * FROM attempts WHERE FirstName LIKE '$fname'";
					} elseif ($studentid != "") {
						$query = "SELECT * FROM attempts WHERE StudentID LIKE '$studentid'"; 
					} else {
						$query = "SELECT * FROM attempts";
						echo "<p>No Name or ID was entered.</p>";
					}
				}
				
			} elseif ($manage == "ViewPerfect") {
				$query = "SELECT * FROM attempts WHERE AttemptNo LIKE 1 AND Score LIKE 100";
				
			} elseif ($manage == "ViewFail") {
				$query = "SELECT * FROM attempts WHERE AttemptNo LIKE 3 AND Score < 50";
				
			} elseif ($manage == "DeleteStudent") {
				if(isset($_GET["DeleteStudentID"])) {
					$studentid = $_GET["DeleteStudentID"];
					if($studentid != "") {
						$query = "DELETE FROM attempts WHERE StudentID = '$studentid'";
						$result = mysqli_query($conn, $query);
						$query = "SELECT * FROM attempts";
					} else { 
						$query = "SELECT * FROM attempts";
						echo "<p>No ID was entered.</p>";
					}
				}
				
			} elseif ($manage == "ChangeStudent") {
				if (isset($_GET["ChangeStudentAttempt"]) && isset($_GET["ChangeStudentID"]) && isset($_GET["ChangeStudentScore"])) {
					$studentid = $_GET["ChangeStudentID"];
					$attemptno = $_GET["ChangeStudentAttempt"];
					$score = $_GET["ChangeStudentScore"];
					if ($attemptno != "" && $studentid != "" && $score != "") {
						$query = "UPDATE attempts SET Score = '$score' WHERE StudentID = '$studentid' AND AttemptNo = '$attemptno'";
						$result = mysqli_query($conn, $query);
						$query = "SELECT * FROM attempts";
					} else {
						$query = "SELECT * FROM attempts";
						echo "<p>Some values were not entered.</p>";
					}
				}
			}
			
			
			$result = mysqli_query($conn, $query);
		
			if(!$result) {
				echo "<p>Something went wrong with ", $query,"</p>";
			} else {
				echo "<table border=\"1\">\n";
				echo "<tr>\n "
					."<th scope=\"col\">ID</th>\n "
					."<th scope=\"col\">Date</th>\n "
					."<th scope=\"col\">FirstName</th>\n "
					."<th scope=\"col\">LastName</th>\n "
					."<th scope=\"col\">StudentID</th>\n "
					."<th scope=\"col\">AttemptNo</th>\n "
					."<th scope=\"col\">Score</th>\n "
					."</tr>\n ";
				
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n";
					echo "<td>",$row["ID"],"</td>\n";
					echo "<td>",$row["Date"],"</td>\n";
					echo "<td>",$row["FirstName"],"</td>\n";
					echo "<td>",$row["LastName"],"</td>\n";
					echo "<td>",$row["StudentID"],"</td>\n";
					echo "<td>",$row["AttemptNo"],"</td>\n";
					echo "<td>",$row["Score"],"</td>\n";
					echo "<tr>\n";
				}
				echo "<table>\n";
			
			mysqli_free_result($result);
		}
		mysqli_close($conn);
	}
	?>
	
		<p>
			<label for= "ViewAll">All attepmts</label>
			<input type= "radio" name= "manage" id= "ViewAll" value= "ViewAll" /><br />
			<br />
			<label for="ViewStudent">All attempts from a student</label>
			<input type= "radio" name= "manage" id= "ViewStudent" value= "ViewStudent" /><br />
			<input type= "text" name= "ViewStudentID" id= "ViewStudentID" placeholder="Student ID" /><br />
			<input type= "text" name= "ViewStudentFName" id= "ViewStudentFName" placeholder="First Name"/><br />
			<br />
			<label for="ViewPerfect">All attempts with 100% on first try</label>
			<input type= "radio" name= "manage" id= "ViewPerfect" value= "ViewPerfect" /><br />
			<br />
			<label for= "ViewFail">All attempts under 50% on third try</label>
			<input type= "radio" name= "manage" id= "ViewFail" value= "ViewFail" /><br />
			<br />
			<label for= "DeleteStudent">Delete all attempts of a student</label>
			<input type= "radio" name= "manage" id= "DeleteStudent" value= "DeleteStudent" /><br />
			<input type= "text" name= "DeleteStudentID" id= "DeleteStudentID" placeholder="Student ID"/><br />
			<br />
			<label for= "ChangeStudent">Change scores of a student</label>
			<input type= "radio" name= "manage" id= "ChangeStudent" value= "ChangeStudent" /><br />
			<input type= "text" name= "ChangeStudentID" id= "ChangeStudentID" placeholder="Student ID"/><br />
			<input type= "text" name= "ChangeStudentAttempt" id= "ChangeStudentAttempt" placeholder="Attempt Number"/><br />
			<input type= "text" name= "ChangeStudentScore" id= "ChangeStudentScore" placeholder="New Score"/><br />
		</p>
	</fieldset>
		<Input type= "submit" value= "Change Results" class="button" />
	</form>
	
	<footer>
		<?php include 'footer.inc'; ?>
	</footer>
	
</body>
</html>