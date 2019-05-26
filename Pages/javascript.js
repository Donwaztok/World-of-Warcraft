

$(window).load(function() {           
	var i =0; 
	var images = ["bg2.jpg","bg3.jpg","bg4.jpg","bg5.jpg","bg6.jpg","bg7.jpg","bg1.jpg"];
	var image = $("#slideit");
              //Initial Background image setup
	image.css("background", "url(../Images/Background/bg1.jpg) fixed");
              //Change image at regular intervals
	setInterval(function(){   
		image.fadeOut(1000, function () {
			image.css("background", "url(../Images/Background/" + images [i++] +") fixed");
			image.fadeIn(1000);
		});
	if(i == images.length)
		i = 0;
	}, 10000);            
});
function NavBar(){
	if (document.getElementById("mySidenav").style.width=="230px") {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("myMenuicon").style.marginLeft = "0";
		document.getElementById("myMenuicon").classList.toggle("change");
	} else {
		document.getElementById("mySidenav").style.width = "230px";
		document.getElementById("myMenuicon").style.marginLeft = "230px";
		document.getElementById("myMenuicon").classList.toggle("change");
	}
}
//=== Scroll To Top ====================================================
$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});