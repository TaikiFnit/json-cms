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
				<input type="text" name="title" id="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="content">本文: </label>
				<textarea name="content" id="content" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<label for="author">記載者: </label>
				<input type="text" name="author" id="author" class="form-control">
			</div>

			<div class="form-group">
			<label for="created">作成者: </label>
			<input type="date" name="created" id="created" class="form-control">
			</div>

			<!--div class="form-group">
				<label for="team">チーム: </label>
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

			<div class="form-group">
				<label for="image_src1">画像1のsrc属性: </label>
				<input type="text" name="image_src1" id="image_src1" class="form-control">
			</div>
			<div class="form-group">
				<label for="image1">画像1のalt属性: </label>
				<input type="text" name="image_alt1" id="image_alt1" class="form-control">
			</div>

			<div class="form-group">
				<label for="image_src2">画像2のsrc属性: </label>
				<input type="text" name="image_src2" id="image_src2" class="form-control">
			</div>

			<div class="form-group">
				<label for="image2">画像2のalt属性</label>
				<input type="text" name="image_alt2" id="image_alt2" class="form-control">
			</div>

			<input type="hidden" name="id" id="id">

			<div class="form-group">
				<button type="button" id="send" class="btn btn-primary">Send!</button>
			</div>
		</form>
	</div>

</main>

<script src="/javascripts/putScript.js"></script>