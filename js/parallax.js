document.addEventListener("DOMContentLoaded", function(){
	// Parallax
	var background = document.getElementsByClassName('max_parallax--bg');
	var floatingDiv = document.getElementsByClassName('max_floatingdiv--bg');
	window.onscroll = function(){
		var scrollY = window.scrollY;
		widgetLoop(background, floatingDiv);
	}
});

// Loop through each instance of this widget
function widgetLoop(background, floatingDiv){
	for (var i=0; i<background.length; i++){
		background[i].style.backgroundPosition = 'center ' + (scrollY*.25) + 'px';
	}
	for (var i=0; i<floatingDiv.length; i++){
		floatingDiv[i].style.top = -16 + (scrollY*0.01) + 'em';
	}
}