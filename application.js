$(document).ready(function(){
	//cheap and dirty delete confirmation
	$('.delete-link').on('click', function(){
		event.preventDefault();
		var link_dat = $(this).attr('href');
		var okay = confirm("Do you really want to delete this?");
		if(okay === true) {
			window.location = link_dat;
		}
	})
})