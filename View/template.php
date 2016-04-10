<!DOCTYPE html>
<html lang="ja">
<head>
	<title>CMS Control Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="Taiki.F.Watanabe">
  <!-- For more author's information, view on https://github.com/TaikiFnit -->

	<!-- bootstrap -->
    <link rel="stylesheet" href="/components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/components/Material/css/material.min.css">
    <link rel="stylesheet" href="/components/Material/css/ripples.min.css">

	<!-- material design lite -->
	<!--link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.teal-pink.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"-->

	<link rel="stylesheet" href="/stylesheets/style.css">

	<script src="/components/jquery.js"></script>

	<!-- bootstrap -->
	<script src="/components/bootstrap/js/bootstrap.js"></script>
	<script src="/components/Material/js/ripples.min.js"></script>
	<script src="/components/Material/js/material.min.js"></script>

	<!-- mateirl design lite -->
	<!--script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script-->

	<script src="/javascripts/common.js"></script>
</head>
<body>

<!--header role="banner" class="navbar">
	<div class="container">
		<div class="rows">
		<h1 class="col-xs-11"><a href="/">IRC Control Panel</a></h1>
		<p class="col-xs-1"><i class="glyphicon glyphicon-menu-hamburger navbar-right"></i></p>
		</div>
	</div>
</header-->
<header role="banner" class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">CMS Control Panel</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/">ホーム</a></li>
          <li><a href="/post">記事作成</a></li>
          <li><a href="/imgControll">画像管理</a>
          <li class="divider"></li>
          <li><a href="/logout">ログアウト</a></li>
        </ul>
      </li>
    </ul>
  </div>
</header>

<?php include $this->filePath; ?>

</body>
</html>