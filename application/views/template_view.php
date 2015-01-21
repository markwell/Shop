<!DOCTYPE html>
<html lang="ru">
   <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Онлайн Магазин</title>
	  <!-- Bootstrap -->
	  <link href="/shop/css/bootstrap.css" rel="stylesheet">
	  <link href="/shop/css/style.css" rel="stylesheet">
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
			   <a href="#" class="navbar-brand"><img src="/shop/images/logo.jpg"></a>
			</div>
			<div class="collapse navbar-collapse" id="responsive-menu">
			   <ul class="nav navbar-nav">
				  <li><a href="/shop/">Главная</a></li>
				  <li class="dropdown">
					 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Категории<b class="caret"></b></a>
					 <ul class="dropdown-menu">
						<li><a href="/shop/user/getitemsandshow?category=2"><?php global $HTTP_POST_VARS; echo $HTTP_POST_VARS['category1']; ?></a></li> 
						<li class="divider"></li>
						<li><a href="/shop/user/getitemsandshow?category=1"><?php echo $HTTP_POST_VARS['category2']; ?></a></li>
						<li><a href="/shop/user/getitemsandshow?category=4"><?php echo $HTTP_POST_VARS['category3']; ?></a></li>
						<li><a href="/shop/user/getitemsandshow?category=3"><?php echo $HTTP_POST_VARS['category4']; ?></a></li>
					 </ul>
				  </li>
				  <li><a href="/shop/user/getitemsandshow">Товары</a></li>
				  <li><a href="/shop/user/getOrderItemsAndShow">Корзина</a></li>
				  <li><a href="/shop/user/showcontacts">Контакты</a></li>
				  <li><a><?php if (isset($_COOKIE['username'])){echo 'Пользователь: '.$_COOKIE['username'];} ?></a></li>
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
						<li><span class="divider"></span><a href="/shop/">Главная</a></li>
						<li><span class="divider"></span><a href="/shop/user/showRegister">Регистрация</a></li>
						<li><span class="divider"></span><a href="/shop/user/showlogin">Авторизация</a></li>
						<!-- <li><span class="divider"></span><a href="/shop/user/logoutUser">Выход</a></li> -->
					</ul>
				</div>
			</div>
	    </div>	  	  

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="/shop/js/jquery.min.js"></script>
	  <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/shop/js/bootstrap.js"></script>
	 
   </body>
</html>