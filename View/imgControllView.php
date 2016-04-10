
<main role="main" class="container">

	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li class="active">画像管理</li>
	</ul>

	<section class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title">画像管理</h2>
		</div>
		<div class="panel-body">
			<div class="row" id="imgIndexArea">

			</div>
		</div>
	</section>

	<a href="#" class="postLink"><button type="button" class="btn btn-fab btn-raised btn-material-red" data-toggle="modal" data-target="#complete-dialog"><i class="material-icons">file_upload</i></button></a>
</main>

<div id="complete-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">画像のアップロード</h4>
      </div>
      <div class="modal-body">
     	<form id="uploadForm" method="POST"> 
     	<div class="form-group">
     		<label for="image">画像の選択</label>
     		<input type="file" class="form-control" name="image" id="image">
        <input type="hidden" name="method" id="method" value="POST">
     	</div>

     	<div class="form-group">
     		<button class="btn btn-info" id="send" type="button">アップロード</button>
     	</div>

     	</form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info btn-flat" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>

<script src="/javascripts/imgControllScript.js"></script>
