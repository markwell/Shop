<div class="container">	
		<h2>Авторизация</h2><br>
		 <div class="row">
		<form role="form" method="POST" action="/shop/login/authUser">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Логин</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" name="login" placeholder="Enter login" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Пароль</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
		  </div>
		  
		  <input name="submit" type="submit" class="btn btn-default" value="Авторизация">
		</form>
		    </div>
		  </div>
		    <div class="container">
		    	<div class="row">
		  		<? 
		  				echo('<br><h4>'.$data.'</h4>');
		  		?>
		      </div>
		     </div>
		  <br>
		  <br>
		  <br>
		  <br>