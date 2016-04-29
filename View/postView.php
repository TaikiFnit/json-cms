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
				<input type="date" name="created" id="created" class="form-control">
				</div>

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

				<div class="image3">
					<div class="form-group">
						<label for="image3">画像3: </label>
						<input type="file" name="image3" id="image3" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt3">画像3の解説:</label>
						<input type="text" name="image_alt3" id="image_alt3" class="form-control">
					</div>
				</div>

				<div class="image4">
					<div class="form-group">
						<label for="image4">画像4: </label>
						<input type="file" name="image4" id="image4" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt4">画像4の解説:</label>
						<input type="text" name="image_alt4" id="image_alt4" class="form-control">
					</div>
				</div>

				<div class="image5">
					<div class="form-group">
						<label for="image5">画像5: </label>
						<input type="file" name="image5" id="image5" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt5">画像5の解説:</label>
						<input type="text" name="image_alt5" id="image_alt5" class="form-control">
					</div>
				</div>

				<div class="image6">
					<div class="form-group">
						<label for="image6">画像6: </label>
						<input type="file" name="image6" id="image6" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt6">画像6の解説:</label>
						<input type="text" name="image_alt6" id="image_alt6" class="form-control">
					</div>
				</div>

				<div class="image7">
					<div class="form-group">
						<label for="image7">画像7: </label>
						<input type="file" name="image7" id="image7" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt7">画像7の解説:</label>
						<input type="text" name="image_alt7" id="image_alt7" class="form-control">
					</div>
				</div>

				<div class="image8">
					<div class="form-group">
						<label for="image8">画像8: </label>
						<input type="file" name="image8" id="image8" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt8">画像8の解説:</label>
						<input type="text" name="image_alt8" id="image_alt8" class="form-control">
					</div>
				</div>

				<div class="image9">
					<div class="form-group">
						<label for="image9">画像9: </label>
						<input type="file" name="image9" id="image9" class="form-control">
					</div>
					<div class="form-group">
						<label for="image_alt9">画像9の解説:</label>
						<input type="text" name="image_alt9" id="image_alt9" class="form-control">
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