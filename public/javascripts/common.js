$(function() {
	$.material.init();

	setTimeout(function() {
		$('.fadeDisplay').fadeIn('slow');
	}, 1000);
});

// get the id from end of url
function getRestId() {
	
	var pathName = location.pathname;

	pathName = pathName.split('/');

	return pathName[pathName.length - 1];
}

// get the news data
function getNewsData(callback) {

	$.ajax({
		url: '/news/' + getRestId(),
		method: 'GET',
		dataType: 'json',
		success: function(data) {
			console.log('in success');
			callback(null, data);
		},
		error: function(e) {
			console.log('in err');
			console.log(e);
			callback(e, null);
		}
	});
}