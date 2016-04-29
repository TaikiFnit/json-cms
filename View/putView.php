<main role="main" class="container">

	<ul class="breadcrumb">
	    <li><a href="/">Index</a></li>
	    <li class="active">Update</li>
	</ul>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Update</div>
		</div>
		<div class="panel-body">
		<form name="putForm" id="putForm" action="/news/">
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

			<div class="form-group">
				<label for="images">画像の数</label>
				<input type="number" name="images" id="images" class="form-control">
			</div>

			<div class="image1">
				<input type="hidden" name="image_id1" id="image_id1">
				<div class="form-group">
					<label for="image_src1">画像1の名前: </label>
					<input type="text" name="image_src1" id="image_src1" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt1">画像1の解説: </label>
					<input type="text" name="image_alt1" id="image_alt1" class="form-control">
				</div>
			</div>

			<div class="image2">
				<input type="hidden" name="image_id2" id="image_id2">
				<div class="form-group">
					<label for="image_src2">画像2の名前: </label>
					<input type="text" name="image_src2" id="image_src2" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt2">画像2の解説:</label>
					<input type="text" name="image_alt2" id="image_alt2" class="form-control">
				<input type="hidden" name="image_id1" id="image_id1">
				</div>
			</div>

			<div class="image3">
				<input type="hidden" name="image_id3" id="image_id3">
				<div class="form-group">
					<label for="image_src3">画像3の名前: </label>
					<input type="text" name="image_src3" id="image_src3" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt3">画像3の解説:</label>
					<input type="text" name="image_alt3" id="image_alt3" class="form-control">
				</div>
			</div>

			<div class="image4">
				<input type="hidden" name="image_id4" id="image_id4">
				<div class="form-group">
					<label for="image_src4">画像4の名前: </label>
					<input type="text" name="image_src4" id="image_src4" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt4">画像4の解説:</label>
					<input type="text" name="image_alt4" id="image_alt4" class="form-control">
				</div>
			</div>

			<div class="image5">
				<input type="hidden" name="image_id5" id="image_id5">
				<div class="form-group">
					<label for="image_src5">画像5の名前: </label>
					<input type="text" name="image_src5" id="image_src5" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt5">画像5の解説:</label>
					<input type="text" name="image_alt5" id="image_alt5" class="form-control">
				</div>
			</div>

			<div class="image6">
				<input type="hidden" name="image_id6" id="image_id6">
				<div class="form-group">
					<label for="image_src6">画像6の名前: </label>
					<input type="text" name="image_src6" id="image_src6" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt6">画像6の解説:</label>
					<input type="text" name="image_alt6" id="image_alt6" class="form-control">
				</div>
			</div>

			<div class="image7">
				<input type="hidden" name="image_id7" id="image_id7">
				<div class="form-group">
					<label for="image_src7">画像7の名前: </label>
					<input type="text" name="image_src7" id="image_src7" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt7">画像7の解説:</label>
					<input type="text" name="image_alt7" id="image_alt7" class="form-control">
				</div>
			</div>

			<div class="image8">
				<input type="hidden" name="image_id8" id="image_id8">
				<div class="form-group">
					<label for="image_src8">画像8の名前: </label>
					<input type="text" name="image_src8" id="image_src8" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt8">画像8の解説:</label>
					<input type="text" name="image_alt8" id="image_alt8" class="form-control">
				</div>
			</div>
			
			<div class="image9">
				<input type="hidden" name="image_id9" id="image_id9">
				<div class="form-group">
					<label for="image_src9">画像9の名前: </label>
					<input type="text" name="image_src9" id="image_src9" class="form-control">
				</div>
				<div class="form-group">
					<label for="image_alt9">画像9の解説:</label>
					<input type="text" name="image_alt9" id="image_alt9" class="form-control">
				</div>
			</div>

			<input type="hidden" name="id" id="id">

			<div class="form-group">
				<button type="button" id="send" class="btn btn-primary">Send!</button>
			</div>
		</form>
	</div>

</main>

<script src="/javascripts/putScript.js"></script>