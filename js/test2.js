function submenuPosition( li ) {
	var subMenu = li.querySelector( 'ul.sub-menu' );
	if ( ! subMenu ) {
		return;
	}
	if (Math.round(subMenu.getBoundingClientRect().right) > Math.round(window.innerWidth)) {
		subMenu.classList.add('submenu-reposition-right');
	} 
}

document.querySelectorAll('.menu-item-has-children').forEach(function(li) {
	li.addEventListener('mouseenter', () => {submenuPosition(li)});
});

function test () {
	if (window.matchMedia("(max-width: 481px)").matches) {
		document.getElementById("content").style.marginTop = document.getElementById("header_page").offsetHeight + 'px';
		document.getElementsByClassName("menu-test2-container")[0].style.top = document.getElementById("header_page").offsetHeight + 'px';
	} else {document.getElementById("content").style.marginTop = 0}
} test();

window.onresize = test;
window.onload = test;

const ham = document.getElementById('ham');
ham.addEventListener('click', function () {
	document.querySelectorAll(".menu-test2-container")[0].classList.toggle('active');
	html = document.getElementsByTagName("html");
	html[0].classList.toggle('scroll');
});
