	<!-- Форма регистрации -->
	<div class="container">	
		<h2>Авторизация</h2><br>
		 <div class="row">
		<form role="form" method="POST" action="login.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Логин</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" name="login" placeholder="Login" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Пароль</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
		  </div>
		  <input name="submit" type="submit" class="btn btn-default" value="Вход">
		</form>
		    </div>
		  </div>

		  <br>
		  <br>
		  <br>
		  <br>

<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
<p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif($login_status=="access_denied") { ?>
<p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } ?>
