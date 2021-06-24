$(document).ready(
	function() {
		let test = false;
		$('#test123').click(
			function () {
				if (test == false) {
					$("#popout").animate({left: '0px'});
					test = true;
				} else {
					$('#popout').animate({left: '-250px'});
					test = false;
				}
   			}
		);
	}
);	
