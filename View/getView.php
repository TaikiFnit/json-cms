<main role="main" class="container">

<ul class="breadcrumb">
<li><a href="/">Home</a></li>
<li class="active">View</li>
</ul>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">View</div></div>
<div class="panel-body">

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
	<label for="created">作成日: </label>
	<input type="date" name="created" id="created" class="form-control" placeholder="2015/01/01" disabled>
	</div>

	<div class="form-group">
		<label for="images">画像の数</label>
		<input type="number" name="images" id="images" class="form-control">
	</div>

	<div class="form-group imagesArea">

	</div>
</div>
</main>

<script src="/javascripts/getScript.js"></script>
