$(function() {

	// 記事の送信
	$('#postForm #send').on('click', function() {

		var flag = true;

		var inputs = ['#title', '#content', '#author', '#created'];

		for(var i = 0; i < inputs.length; i++) {
			if($(inputs[i]).val() == '') {
				flag = false;
			}
		}

		if(flag == false) {
			alert('入力されていない項目があります。');
			return;
		}

		if(window.confirm('本当に記事を追加しますか?')) {

		// form　dataを取得
		var form = $('#postForm').get()[0];

		// 画像を送信するためにform objectを作成
		var formData = new FormData(form);

		$.ajax({
			url: '/news/',
			method: 'POST',
			dataType: 'json',
			// dataとしてformDataを送信する設定
			data: formData,
			// ajaxがdataを整形しない設定
			processData: false,
			// ContentTypeをfalseに指定
			contentType: false,

			success: function(data) {
				console.log(data);

				if(data.result) {
					alert('記事の作成に成功しました。');
					location.href = '/';
				}
				else {
					alert('記事の作成に失敗しました。');
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
		}
	});

	$('#images').val(0);
	setVal();

	$('#images').change(function () {
		setVal()
	});

	function setVal() {
		if($('#images').val() <= 0) {
			$('#images').val(0);
		}

		if($('#images').val() == 0) {
			$('.image1').fadeOut('fast');
			$('.image2').fadeOut('fast');
		}

		if($('#images').val() == 1) {
			$('.image1').fadeIn('fast');
			$('.image2').fadeOut('fast');
		}

		if($('#images').val() == 2) {
			$('.image1').fadeIn('fast');
			$('.image2').fadeIn('fast');
		}

		if($('#images').val() >= 3) {
			$('.image1').fadeIn('fast');
			$('.image2').fadeIn('fast');
			$('#images').val(2);
		}
	}
});
