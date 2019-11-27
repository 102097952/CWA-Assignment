<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset= "utf-8" />
	<meta name= "description" content= "A quiz to assess the content on this website" />
	<meta name= "keywords" content= "TCP/IP" />
	<meta name= "author" content= "James McKenna" />
	<title>TCP/IP - Quiz</title>
	<link href= "styles/styles.css" rel= "stylesheet" />
	<!--<script src= "scripts/quiz.js"></script>-->
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
		<h2>Quiz</h2>
		<p id="instruct">Test your knowledge in TCP/IPs in this simple quiz</p>
	</article>
	
	<form id="answers" method="post" action="markquiz.php" novalidate="novalidate">
		<fieldset>
			<legend>Question 1</legend>
			<p>What did TCP first stand for when it was invented?</p>
			<p>
				Answer: <br />
				<textarea name= "Q1" id= "Q1" rows= "3" cols= "35" ></textarea>
			</p>
		</fieldset>
		
		<fieldset id= "Q2" >
			<legend>Question 2</legend>
			<p>Who created IPv6?</p>
			<p>
				Answer: <br />
				<label for= "DARPA">Defence Advanced Research Project Agentcy</label>
				<input type= "radio" name= "Q2" id= "DARPA" value= "DARPA" />
				<br />
				<label for="IETF">Internet Engineering Task Force</label>
				<input type= "radio" name= "Q2" id= "IETF" value= "IETF" />
				<br />
				<label for="usMilitary">United States Military</label>
				<input type= "radio" name= "Q2" id= "usMilitary" value= "US Military" />
				<br />
				<label for= "Postel">John Postel</label>
				<input type= "radio" name= "Q2" id= "Postel" value= "John Postel" />
			</p>
		</fieldset>
		
		<fieldset>
			<legend>Question 3</legend>
			<p>How many network layers are on the TCP/IP model of data tranfer?</p>
			<p>Answer: 
				<select name= "Q3" id= "Q3" >
					<option value= "">Select</option>
					<option value= "4 layers">4 layers</option>
					<option value= "5 layers">5 layers</option>
					<option value= "6 layers">6 layers</option>
					<option value= "7 layers">7 layers</option>
				</select>
			</p>
		</fieldset>
		
		<fieldset>
			<legend>Question 4</legend>
			<p>Who created the idea of a seperate Internet Protocol?</p>
			<p>
				Answer: 
				<input type= "text" name= "Q4" id= "Q4" pattern= "[A-Za-z\s]{1,40}" />
			</p>
		</fieldset>
		
		<fieldset>
			<legend>Question 5</legend>
			<p>Which of the following are layers of the ISO model?</p>
			<p>
				Answer: <br/>
				<label for= "interface">Network Interface</label>
				<input type= "checkbox" id= "interface" name= "interface" value= "Network Interface" />
				<br />
				<label for= "interface">Presentaion</label>
				<input type= "checkbox" id= "presentation" name= "presentation" value= "Presentaion" />
				<br />
				<label for= "interface">Connection</label>
				<input type= "checkbox" id= "connection" name= "connection" value= "Connection" />
				<br />
				<label for= "interface">Session</label>
				<input type= "checkbox" id= "session" name= "session" value= "Session" />
				<br />
				<label for= "interface">Transport</label>
				<input type= "checkbox" id= "transport" name= "transport" value= "Transport" />
			</p>
		</fieldset>
		
		<fieldset>
			<legend>Submit</legend>
			<p>
				<label for= "fname">First name:</label>
				<input type= "text" name= "fname" id= "fname" pattern= "[A-Za-z\s\-]{1,20}" />
			</p>
			<p>
				<label for= "lname">Last name:</label>
				<input type= "text" name= "lname" id= "lname" pattern= "[A-Za-z\s\-]{1,20}" />
			</p>
			<p>
				<label for= "ID">Student number:</label>
				<input type= "text" name= "ID" id= "ID" pattern= "\d{7,10}" />
			</p>
		</fieldset>
		
	<Input type= "submit" value= "Submit" class="button" />
	<Input type= "reset" value= "Reset Answers" class="button" />
	</form>
	
	<footer>
		<?php include 'footer.inc'; ?>
	</footer>
	
</body>
</html>