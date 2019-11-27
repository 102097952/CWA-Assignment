/*
* Author: James McKenna
* Target: results.html
* Purpose: To display the results of the quiz
* Created: 23/4/2018
* Last updated: 24/4/2018
*/

"use strict";


function init() {
	var results = (localStorage.getItem("score") / 5 * 100);
	var retry = document.getElementById("retry");
	
	document.getElementById("finalScore").textContent = results + "%";
	document.getElementById("finalName").textContent = localStorage.getItem("fname") + " " + localStorage.getItem("lname");
	document.getElementById("finalID").textContent = localStorage.getItem("id");
	document.getElementById("attemptNo").textContent = localStorage.getItem("attempts");
	
	if (localStorage.attempts == 3) {
		retry.style.display = "none";
	}
}


window.onload = init;