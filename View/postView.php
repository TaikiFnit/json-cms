<main role="main" class="container">

	<ul class="breadcrumb">
	    <li><a href="/">Index</a></li>
	    <li class="active">記事作成</li>
	</ul>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title">記事作成</h2>
		</div>

		<div class="panel-body">

			<form name="postForm" id="postForm" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">タイトル: </label>
					<input type="text" name="title" id="title" class="form-control" placeholder="Title">
				</div>

				<div class="form-group">
					<label for="content">本文: </label>
					<textarea name="content" id="content" class="form-control" rows="10" placeholder="Content"></textarea>
				</div>

				<div class="form-group">
					<label for="author">記載者: </label>
					<input type="text" name="author" id="author" class="form-control" placeholder="E.X">
				</div>

				<div class="form-group">
				<label for="created">作成日: </label>
				<input type="date" name="created" id="created" class="form-control" placeholder="2015/01/01">
				</div>

				<!--div class="form-group">
					<label for="team">カテゴリ: </label>
					<select name="team" id="team" class="form-control">
						<option value="0">IRC</option>
						<option value="1">ハード班</option>
						<option value="2">ソフト班</option>
						<option value="3">ウェブ班</option>
					</select>
				</div-->

				<div class="form-group">
					<label for="images">画像の数</label>
					<input type="number" name="images" id="images" class="form-control">
				</div>

				<div class="image1">
					<div class="form-group">
						<label for="image1">画像1: </label>
						<input type="file" name="image1" id="image1" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt1">画像1の解説: </label>
						<input type="text" name="image_alt1" id="image_alt1" class="form-control">
					</div>
				</div>

				<div class="image2">
					<div class="form-group">
						<label for="image2">画像2: </label>
						<input type="file" name="image2" id="image2" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt2">画像2の解説:</label>
						<input type="text" name="image_alt2" id="image_alt2" class="form-control">
					</div>
				</div>

				<input type="hidden" id="method" name="method" value="POST">

				<div class="form-group">
					<button type="button" id="send" class="btn btn-primary btn-raised">Create!</button>
				</div>
			</form>
		</div>
	</div>

</main>

<script src="/javascripts/postScript.js"></script>