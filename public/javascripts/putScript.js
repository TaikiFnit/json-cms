var default_image_num;
$(function(){

	// get the news data
	getNewsData(function(err, data) {

		console.log(data);

		if(!err && !data) {
			location.href = '/';
			return;
		}

		// view the data
		$('#id').val(data['news_id']);
		$('#title').val(data.title);
		$('#content').val(data.content);
		$('#author').val(data.author);
		$('#created').val(data.created);
		$('#images').val(data['images_num']);
		default_image_num = data['images_num'];

		for(var i = 0; i < data['images_num']; i++) {
			$('#image_id' + (i + 1)).val(data['images'][i]['image_id']);	
			$('#image_src' + (i + 1)).val(data['images'][i]['image_name']);	
			$('#image_alt' + (i + 1)).val(data['images'][i]['image_alt']);
		}

		setVal();
	});

	$('#images').change(function () {
		setVal()
	});

	function setVal() {

		// 現在の画像送付可能数の最大値: 9 (formを動的に生成してないため)
		if( $('#images').val() >= 10 ) {
			$('#images').val(9);
		}

		if( $('#images').val() < 0 ) {
			$('#images').val(0);
		}

		// 仕様により、初期レコード以下に減らすことはできない
		if( $('#images').val() < default_image_num ) {
			$('#images').val(default_image_num);
			alert('仕様により、初期レコード以下に減らすことはできません!');
		}

		for(var i = 1; i < 10; i++) {
			if(i <= $('#images').val()) {
				$('.image' + i).show();
			}
			else {
				$('.image' + i).hide();
			}
		}
	}	
});

// 記事の送信
$('#putForm #send').on('click', function() {

	if(window.confirm('本当に更新しますか?')) {
		// form　dataを取得
		var form = $('#putForm').get()[0];

		// 画像を送信するためにform objectを作成
		var formData = new FormData(form);

		var data = {};

		data['method'] = "PUT";
		data['title'] = $('#title').val();
		data['content'] = $('#content').val();
		data['author'] = $('#author').val();
		data['created'] = $('#created').val();
		data['images'] = $('#images').val();

		for(var i = 1; i <= data['images']; i++) {
			data['image_src' + i] = $('#image_src' + i).val();
			data['image_alt' + i] = $('#image_alt' + i).val();
			data['image_id' + i] = $('#image_id' + i).val();
		}

		$.ajax({
			url: '/news/' + getRestId(),
			method: 'POST',
			dataType: 'json',
			// dataとしてformDataを送信する設定
			data: data,
			success: function(data) {
				if(data.result) {
					alert('更新に成功しました。');
					location.href = '/';
				}
				else {
					alert('更新に失敗しました。');
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	}
});