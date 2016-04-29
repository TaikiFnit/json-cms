$(function() {

	// view the news data
	getNewsData(function (err, data) {

		if(!data) {
			alert('Err');
		}

		console.log(data);

		// view the data
		$('#id').val(data['news_id']);
		$('#title').val(data.title);
		$('#content').val(data.content);
		$('#author').val(data.author);
		$('#created').val(data.created);
		$('#images').val(data.images_num);

		var i;
		var code = '';

		for(i = 0; i < data.images_num; i++) {

			// add row
			if(i % 2 == 0) {
				code += '<div class="row">';
			}

			code += '<div class="col-sm-6">';
				code += '<div class="thumbnail">';
					code += '<img src="' + data['images'][i]['image_src'] + '" alt="' + data['images'][i]['image_alt'] + '">';
					code += '<div class="caption">';
						code += '<h3>' + data['images'][i]['image_alt'] +'</h3>';
					code += '</div>';
				code += '</div>';
			code += '</div>';

			if(i % 2 == 1) {
				code += '</div>';	
			}
		}

		if(i % 2 == 1) {
			code += '</div>';	
		}

		$('.imagesArea').html(code);
	});
});

