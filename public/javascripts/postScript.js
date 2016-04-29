$(function() {

	var date = new Date();
	var created = (date.getFullYear()) + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + (date.getDate())).slice(-2);
	$('#created').val(created);

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

		for(var i = 1; i < 10; i++) {
			if(i <= $('#images').val()) {
				$('.image' + i).show();
			}
			else {
				$('.image' + i).hide();
			}
		}

		// 現在の画像送付可能数の最大値: 9 (formを動的に生成してないため)
		if( $('#images').val() >= 10 ) {
			$('#images').val(9);
		}
	}
});
