<!-- Форма регистрации -->
	<div class="container">	
		<h2>Регистрация</h2><br>
		 <div class="row">
		<form role="form" method="POST" action="/shop/user/newuser">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Логин</label>
		    <input type="login" class="form-control" id="exampleInputEmail1" name="login" placeholder="Enter login" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Пароль</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword2">Повторите пароль</label>
		    <input type="password" class="form-control" id="exampleInputPassword2" name="repass" placeholder="Password" required>
		  </div>
		  <input name="submit" type="submit" class="btn btn-default" value="Зарегистрироваться">
		</form>
		    </div>
		  </div>
		  <div class="container">
		  	<div class="row">
					<? 
					if (isset($data)) //по идее такого в виде не должно быть, но иначе будет ошибка на странице
					{ 
						foreach ($data['error'] as $value) 
						{
							echo('<br><div class="alert alert-warning" role="alert">'.$value.'</div>');
						}	
					}
					?>
		    </div>
		   </div>
		  <br>
		  <br>
		  