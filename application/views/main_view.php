<!-- Карусель(слайдер) -->
	<div id="carousel" class="carousel slide">

	  	<!-- Индикаторы слайдов -->
	  	<ol class="carousel-indicators">
	  		<li class="active" data-target="#carousel" data-slide-to="0"></li>
	  		<li data-target="#carousel" data-slide-to="1"></li>
	  		<li data-target="#carousel" data-slide-to="2"></li>
	  	</ol>

	  	<!-- Слайды -->
	  	<div class="carousel-inner">
	  		<div class="item active">
	  			<img src="images/1.jpg" alt="">
	  			<div class="carousel-caption">
	  				<h3>Первый слайд</h3>
	  				<p>Описание первого слайда</p>
	  			</div>
	  		</div>
	  		<div class="item">
	  			<img src="images/2.jpg" alt="">
	  			<div class="carousel-caption">
	  				<h3>Второй слайд</h3>
	  				<p>Описание второго слайда</p>
	  			</div>
	  		</div>
	  		<div class="item">
	  			<img src="images/3.jpg" alt="">
	  			<div class="carousel-caption">
	  				<h3>Третий слайд слайд</h3>
	  				<p>Описание третьего слайда</p>
	  			</div>
	  		</div>
	  	</div>	
	

	  	<!-- Стрелки переключения слайдов -->
	  		<a href="#carousel" class="left carousel-control" data-slide="prev">
	  			<span class="glyphicon glyphicon-chevron-left"></span>
	  		</a>
	  		<a href="#carousel" class="right carousel-control" data-slide="next">
	  			<span class="glyphicon glyphicon-chevron-right"></span>
	  		</a>
		</div>

		<br><br><br><br>

	<!-- Основной контент сайта -->
		<div class="container">
		 <div class="row">
		   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		   	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi sunt, dolorem corporis blanditiis quisquam nisi itaque at cum harum odit, laboriosam, nostrum optio veritatis dolores obcaecati fugiat aut eaque. Laboriosam!
		   </div>
		   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti debitis eveniet dolorum ducimus modi odit iusto cupiditate, consequuntur sit neque magnam deserunt expedita in officiis, quam culpa odio, hic soluta.
			</div>
		   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		   	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium earum reprehenderit, tenetur iste recusandae quasi. Beatae incidunt mollitia ut, quam nobis ea eligendi numquam consectetur, ab corrupti neque, vel facilis.
		   	<p><i class="glyphicon glyphicon-heart"></i></p>

		   </div>
		 </div>
		</div>

		<br><br><br><br>


	

		<!-- Скрипт автоматической прокрутки слайдера-to -->
		<script type='text/javascript'>
    	$(document).ready(function() {
         $('.carousel').carousel({
             interval: 3000
         })
    		});    
    	</script>﻿