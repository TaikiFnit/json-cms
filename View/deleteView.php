<main role="main" class="container">

<ul class="breadcrumb">
<li><a href="/">Home</a></li>
<li class="active">Delete</li>
</ul>
<div class="panel panel-danger">
<div class="panel-heading"><div class="panel-title">Delete</div></div>
<div class="panel-body">

	<div id="deleteForm">

	<div class="form-group">
		<label for="title">タイトル: </label>
		<input type="text" name="title" id="title" class="form-control" placeholder="Title" disabled>
	</div>

	<div class="form-group"> 
		<label for="content">本文: </label>
		<textarea name="content" id="content" class="form-control" rows="10" placeholder="Content" disabled></textarea>
	</div>

	<div class="form-group">
		<label for="author">記載者: </label>
		<input type="text" name="author" id="author" class="form-control" placeholder="E.X" disabled>
	</div>

	<div class="form-group">
	<label for="created">作成者: </label>
	<input type="date" name="created" id="created" class="form-control" placeholder="2015/01/01" disabled>
	</div>

	<div class="form-group">
		<label for="team">チーム: </label>
		<select name="team" id="team" class="form-control" disabled>
			<option value="0">IRC</option>
			<option value="1">ハード班</option>
			<option value="2">ソフト班</option>
			<option value="3">ウェブ班</option>
		</select>
	</div>

	<div class="form-group">
		<label for="images">画像の数</label>
		<input type="number" name="images" id="images" class="form-control" disabled>
	</div>

	<div class="form-group">
		<label for="image_src1">画像1のsrc属性: </label>
		<input type="text" name="image_src1" id="image_src1" class="form-control" disabled>
	</div>
	<div class="form-group">
		<label for="image1">画像1のalt属性: </label>
		<input type="text" name="image_alt1" id="image_alt1" class="form-control" disabled>
	</div>

	<div class="form-group">
		<label for="image_src2">画像2のsrc属性: </label>
		<input type="text" name="image_src2" id="image_src2" class="form-control" disabled>
	</div>	

	<div class="form-group">
		<label for="image2">画像2のalt属性:</label>
		<input type="text" name="image_alt2" id="image_alt2" class="form-control" disabled>
	</div>

	<div class="form-group">
		<button type="button" id="send" class="btn btn-danger">Delete</button>
	</div>
	</div>
</div>
</main>

<script src="/javascripts/getScript.js"></script>
<script src="/javascripts/deleteScript.js"></script>