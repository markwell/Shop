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
						<span>ID: '.$row['id'].'</span>
					</div>
				</div>
			</div>
		</div>';
    }
?>
<form role="form" method="POST" action="/shop/user/deleteItemFromOrder">
<div class="form-group">
  <label for="exampleInputEmail1">Введите ID товара для удаления из корзины</label>
  <input type="email" class="form-control" id="exampleInputEmail1" name="deleteItem" placeholder="Enter ID" required>
</div>
  <input name="submit" type="submit" class="btn btn-default" value="Удалить">
</form>