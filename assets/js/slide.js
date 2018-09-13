var slideItem = 0;
window.onload = function() {
	setInterval(passarSlide, 5000);
	var slidewidth = document.getElementById("slideshow").offsetWidth;
	var objs = document.getElementsByClassName("slide");
	for(var i in objs) {
		objs[i].style.width = slidewidth;
	}	
}

function passarSlide(){
	var slidewidth = document.getElementById("slideshow").offsetWidth;
	if(slideItem >= 2){
		slideItem = 0;
	} else {
		slideItem++;
	}

	document.getElementsByClassName("slideshowarea")[0].style.marginLeft = "-"+(slidewidth * slideItem)+"px";
}

function mudarSlide(pos){
	slideItem = pos;
	var slidewidth = document.getElementById("slideshow").offsetWidth;
	document.getElementsByClassName("slideshowarea")[0].style.marginLeft = "-"+(slidewidth * slideItem)+"px";

}