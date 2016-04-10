$('#deleteForm #send').on('click', function() {

	if(window.confirm('本当に削除しますか?')) {

		$.ajax({
			url: '/news/' + getRestId(),
			method: 'DELETE',
			dataType: 'json',
			success: function(data) {
				if(data.result == true) {
					alert('記事の削除に成功しました。');
					location.href = '/';
				}
				else if(data.result == false){
					alert('記事の削除に失敗しました。');
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	}
});
