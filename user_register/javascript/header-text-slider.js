
// This simple function returns object reference for elements by ID
function _(x){return document.getElementById(x);}
// Variables for bubble array, bubble index, and the setInterval() variable
var ba, bi=0, intrvl;
// bca - Bubble Content Array. Put your content here.
var bca = [
    '  <img id="header" src="image/image-text1.png">',
	'  <img id="header" src="image/image-text3.png"> ',
];
// This function is triggered by the bubbleSlide() function below
function bubbles(bi){
	// Fade-out the content
	_("bubblecontent").style.opacity = 0.1;
	// Loop over the bubbles and change all of their background color
	for(var i=0; i < ba.length; i++){
		ba[i].style.background = "none";
	}
	// Change the target bubble background to be darker than the rest
	ba[bi].style.background = "white";
	// Stall the bubble and content changing for just 300ms
	setTimeout(function(){
		// Change the content
		_("bubblecontent").innerHTML = bca[bi];
		// Fade-in the content
		_("bubblecontent").style.opacity = 2;
	}, 400);
}
// This function is set to run every 5 seconds(5000ms)
function bubbleSlide(){
	bi++; // Increment the bubble index number
	// If bubble index number is equal to the amount of total bubbles
	if(bi == ba.length){
		bi = 0; // Reset the bubble index to 0 so it loops back at the beginning
	}
	// Make the bubbles() function above run
	bubbles(bi);
}
// Start the application up when document is ready

window.addEventListener("load", function(){
	// Get the bubbles array
	ba = _("bubbles").children;
	// Set the interval timing for the slideshow speed
	intrvl = setInterval(bubbleSlide, 9000);
});
