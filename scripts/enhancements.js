/*
* Author: James McKenna
* Target: topic.html
* Purpose: To add accordion to the topic page
* Created: 23/4/2018
* Last updated: 25/4/2018
*/


function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("topButton").style.display = "block";
    } else {
        document.getElementById("topButton").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


function init() {
// for accodion 
var accordion = document.getElementsByClassName("Heading");
var i;

for (i = 0; i < accordion.length; i++) {
    accordion[i].addEventListener("click", function() {

        // Toggle between hiding and showing the active panel
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } 
		else {
            panel.style.display = "block";
        }
    });
}

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

}

window.onload = init;