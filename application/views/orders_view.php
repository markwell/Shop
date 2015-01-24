<?php
foreach($data as $row)
    {
		echo 
		'<div class="container text-center">
			<div class="row">
				<div class="media">
					<a class="media-left media-middle" href="#"><img src="'.$row['image'].'" alt="Блюдо"></a>
					<div class="media-body">
						<h4 class="media-heading">
							'.$row['name'].'
						</h4>
						'.$row['description'].'
						<p class="lead">ID: '.$row['id'].'</p>
					</div>
				</div>
			</div>
		</div>';
    }
?>
<br />
<br />
<br />
<div class="container text-center">
	<div class="row">
		<form role="form" method="POST" action="/shop/user/deleteItemFromOrder" class="form-inline">
			<div class="form-group">
  				<label for="exampleInputEmail1">Введите ID товара для удаления из корзины</label>
  				<input type="text" class="form-control" id="exampleInputEmail1" name="deleteItem" placeholder="Enter ID" required>
			</div>
			<br />
			<br />
  			<input name="submit" type="submit" class="btn btn-default" value="Удалить">
		</form>
	</div>
</div>
<br />
<br />
<br />