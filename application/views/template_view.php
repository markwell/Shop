<!DOCTYPE html>
<html lang="ru">
   <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Онлайн Магазин</title>
	  <!-- Bootstrap -->
	  <link href="css/bootstrap.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.pond/xs.42/respond.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.pond/xs.42/respond.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.pond/xs.42/respond.min.js"></script>
	  <![endif]-->
   </head>
   <body>

   	<!-- Адаптивная навигация по сайту -->
   	<div class="container">
   		<div class="row">
		<div class="navbar navbar-inverse navbar-fixed-top">
		 <div class="container">
			<div class="navbar-header">
			   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
			   <span class="sr-only"></span>
			   <span class="icon-bar"></span>
			   <span class="icon-bar"></span>
			   <span class="icon-bar"></span>
			   </button>
			   <a href="#" class="navbar-brand">Логотип</a>
			</div>
			<div class="collapse navbar-collapse" id="responsive-menu">
			   <ul class="nav navbar-nav">
				  <li><a href="#">Пункт1</a></li>
				  <li class="dropdown">
					 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Пункт2<b class="caret"></b></a>
					 <ul class="dropdown-menu">
						<li><a href="#">Пункт1</a></li> 
						<li><a href="#">Пункт2</a></li>
						<li><a href="#">Пункт3</a></li>
						<li class="divider"></li>
						<li><a href="#">Пункт4</a></li>
					 </ul>
				  </li>
				  <li><a href="#">Пункт3</a></li>
			   </ul>
			</div>
		 </div>
		</div>
	    </div>
	</div>

	<br>
	<br>
	<br>
	<br>

	<!-- Контент -->
	<?php include 'application/views/'.$content_view; ?>

	<!-- Footer -->
		<div class="container">
			<div class="row">
				<div class="panel-footer">
					<ul class="list-inline">
						<li><span class="divider"></span><a href="register">Регистрация</a></li>
						<li><span class="divider"></span><a href="login">Авторизация</a></li>
						<li><span class="divider"></span><a href="#">Выход</a></li>
					</ul>
				</div>
			</div>
	    </div>	  	  

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.js"></script>
	 
   </body>
</html>