$(function() {

	$.ajax({
		url: '/news/*',
		method: 'get',
		dataType: 'json',
		success: function(data) {

			console.log(data);

			if(data != null) {

				var code = '';

				code += '<tr>'

				//code += '<th>ID</th><th>タイトル</th><th>作成日</th><th>カテゴリ</th><th>画像の数</th><th>操作</th>';
				code += '<th>ID</th><th>タイトル</th><th>作成日</th><th>操作</th>';

				code += '</tr>';

				for(var i = 0; i < data.length; i++) {
					code += '<tr>';

					code += '<td>' + data[i]['news_id'] + '</td>';
					code += '<td>' + data[i].title + '</td>';
					code += '<td>' + data[i].created + '</td>';
					//code += '<td>' + data[i].category + '</td>';
					//code += '<td>' + data[i].images + '</td>';
					code += '<td>';
					code += '<div class="dropdown">';
					//code += '<button type="button" class="btn btn-info btn-sm btn-flat">View</button>';
					code += '<button type="button" id="button' + data[i]['news_id'] + '" class="btn btn-info btn-sm btn-flat dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
					code += '操作 <span class="caret"></span>';
					code += '</button>';
					code += '<ul class="dropdown-menu" aria-labelledby="button' + data[i]['news_id'] + '">';
					code += '<li><a href="/get/' + data[i]['news_id'] + '">見る</a></li>';
					code += '<li role="separator" class="divider"></li>';
					code += '<li><a href="/put/' + data[i]['news_id'] + '">編集する</a></li>';
					code += '<li role="separator" class="divider"></li>';
					code += '<li><a href="/delete/' + data[i]['news_id'] + '">削除する</a></li>';
					code += '</ul>';
					code += '</div>';
					code += '</td>';

					code += '</tr>';
				}

				$('#newsIndexTable').html(code);
			}
		},
		error: function(err) {
			alert('Error! for more informations, see console.');
			console.log(err);
		}
	});

	$('#truncateNews').on('click', function() {
		if(window.confirm('本当にすべての記事と画像を削除しますか?')) {
			if(window.confirm('本当に本当にすべての記事と画像を削除しますか?')) {
				$.ajax({
					url: '/truncate/',
					dataType: 'json',
					method: 'delete',
					success: function(data) {
						if(data.result) {
							alert('記事の削除に成功しました。')
							location.reload();
						}
						else {
							alert('記事の削除に失敗しました。')
						}
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		}
	});
});