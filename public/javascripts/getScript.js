$(function() {

	// view the news data
	getNewsData(function (err, data) {
		
		if(!err && !data) {
			location.href = '/';
			return;
		}

		// view the data
		$('#id').val(data.id);
		$('#title').val(data.title);
		$('#content').val(data.content);
		$('#author').val(data.author);
		$('#created').val(data.created);
		$('#team').val(data.team);
		$('#images').val(data.images);
		$('#image_src1').val(data.image_src1);
		$('#image_src2').val(data.image_src2);
		$('#image_alt1').val(data.image_alt1);
		$('#image_alt2').val(data.image_alt2);
	});
});

