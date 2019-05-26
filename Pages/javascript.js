

$(window).load(function() {           
	var i =0; 
	var images = ["bg2.jpg","bg3.jpg","bg4.jpg","bg5.jpg","bg6.jpg","bg7.jpg","bg1.jpg"];
	var image = $("#slideit");
              //Initial Background image setup
	image.css("background", "url(Images/Background/bg1.jpg) fixed");
              //Change image at regular intervals
	setInterval(function(){   
		image.fadeOut(1000, function () {
			image.css("background", "url(Images/Background/" + images [i++] +") fixed");
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
//=== Drag and move ========================================================
interact('.draggable')
	.draggable({
		inertia: true,
		restrict: {
			restriction: "parent",
			endOnly: true,
		elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
	},
	autoScroll: true,

	onmove: dragMoveListener,
	onend: function (event) {
		var textEl = event.target.querySelector('p');

		textEl && (textEl.textContent =
		'moved a distance of '
		+ (Math.sqrt(event.dx * event.dx +
					event.dy * event.dy)|0) + 'px');
	}
});
function dragMoveListener (event) {
	var target = event.target,
		x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
		y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

	target.style.webkitTransform =
	target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';

	target.setAttribute('data-x', x);
	target.setAttribute('data-y', y);
}
window.dragMoveListener = dragMoveListener;

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