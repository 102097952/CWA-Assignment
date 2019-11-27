/*
* Author: James McKenna
* Target: quiz.html
* Purpose: To assess the results of the quiz
* Created: 23/4/2018
* Last updated: 24/4/2018
*/

"use strict";


function storeData(fname, lname, id, score, attempts) {
	localStorage.setItem("attempts", attempts);
	localStorage.setItem("fname", fname);
	localStorage.setItem("lname", lname);
	localStorage.setItem("id", id);
	localStorage.setItem("score", score);
}


function getAnswer2() {
	var answer = "unknown";
	var answerArray = document.getElementById("Q2").getElementsByTagName("input");
	
	for(var i = 0; i < answerArray.length; i++) {
		if (answerArray[i].checked)
			answer = answerArray[i].value;
	}
	return answer;
}


function validate() {
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var id = document.getElementById("ID").value;
	
	var q1 = document.getElementById("Q1").value;
	var q2 = getAnswer2();
	var q3 = document.getElementById("Q3").value;
	var q4 = document.getElementById("Q4").value;
	
	var interface5 = document.getElementById("interface").checked;
	var presentaion5 = document.getElementById("presentation").checked;
	var connection5 = document.getElementById("connection").checked;
	var session5 = document.getElementById("session").checked;
	var transport5 = document.getElementById("transport").checked;
	
	var errMsg = "";
	var result = true;
	var attempts = 0
	var attempts = Number(attempts);
	var score = 0
	
	if (! (localStorage.getItem("attempts") == 1||localStorage.getItem("attempts") == 2||localStorage.getItem("attempts") == 3) ){
		localStorage.setItem("attempts", attempts);
	}
	else {
		attempts = Number(localStorage.attempts);
	}
	
	
	if(q1 == "Transmission Communication Protocol") {
		score += 1;
	}
	if(q2 == "IETF") {
		score += 1;
	}
	if(q3 == "4 layers") {
		score += 1;
	}
	if(q4 == "John Postel") {
		score += 1;
	}
	if(presentaion5&&session5&&transport5) {
		score += 1;
	}
	
	
	if (score == 0) {
		errMsg = "You have no correct answers. Try again.";
	}
	if(! (interface5||presentaion5||connection5||session5||transport5)) {
		errMsg = "You have not answered Q4";
	}
	if (attempts > 2) {
		errMsg = "You have used up your three attempts";
	}
	
	
	if (errMsg != ""){
		alert(errMsg);
		result = false;
	}
	if(result) {
		attempts += 1
		storeData(fname, lname, id, score, attempts);
	}
	
	
	return result;
}


function init() {
	var answers = document.getElementById("answers");
	answers.onsubmit = validate;
}

window.onload = init;