<main role="main" class="container">

<ul class="breadcrumb">
<li><a href="/">Home</a></li>
<li class="active">View</li>
</ul>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">View</div></div>
<div class="panel-body">

	<div class="form-group">
		<label for="title">Title: </label>
		<input type="text" name="title" id="title" class="form-control" placeholder="Title" disabled>
	</div>

	<div class="form-group"> 
		<label for="content">Content: </label>
		<textarea name="content" id="content" class="form-control" rows="10" placeholder="Content" disabled></textarea>
	</div>

	<div class="form-group">
		<label for="author">author: </label>
		<input type="text" name="author" id="author" class="form-control" placeholder="E.X" disabled>
	</div>

	<div class="form-group">
	<label for="created">Created: </label>
	<input type="date" name="created" id="created" class="form-control" placeholder="2015/01/01" disabled>
	</div>

	<div class="form-group">
		<label for="team">Team: </label>
		<select name="team" id="team" class="form-control" disabled>
			<option value="0">IRC</option>
			<option value="1">ハード班</option>
			<option value="2">ソフト班</option>
			<option value="3">ウェブ班</option>
		</select>
	</div>

	<div class="form-group">
		<label for="images">Images Number</label>
		<input type="number" name="images" id="images" class="form-control" disabled>
	</div>

	<div class="form-group">
		<label for="image_src1">Image_src1: </label>
		<input type="text" name="image_src1" id="image_src1" class="form-control" disabled>
	</div>
	<div class="form-group">
		<label for="image1">Image1 Alt: </label>
		<input type="text" name="image_alt1" id="image_alt1" class="form-control" disabled>
	</div>

	<div class="form-group">
		<label for="image_src2">Image_src2: </label>
		<input type="text" name="image_src2" id="image_src2" class="form-control" disabled>
	</div>	

	<div class="form-group">
		<label for="image2">Image2 Alt:</label>
		<input type="text" name="image_alt2" id="image_alt2" class="form-control" disabled>
	</div>

</div>
</main>

<script src="/javascripts/getScript.js"></script>
