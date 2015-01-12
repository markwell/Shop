
		<!-- тут выводим сам объект в соответствии с номером текущего элемента в пагинации -->
		'<div class="container text-center">
			<div class="row">
				<div class="media">
					<a class="media-left media-middle" href="#"><img src="<?=$data['items'][$data['pagination']['active']-1]['image']?>" alt="Блюдо"></a>
					<div class="media-body">
						<h4 class="media-heading">
							<?=$data['items'][$data['pagination']['active']-1]['name']?>
						</h4>
						<?=$data['items'][$data['pagination']['active']-1]['description']?>
					</div>
					<span>Цена:</span> <div><?=$data['items'][$data['pagination']['active']-1]['price']?></div>
					<form role="form" method="POST" action="/shop/user/addItemToOrder">
						<input name="submit" type="submit" class="btn btn-default" value="В корзину">
					</form>
				</div>
			</div>
		</div>

		<!-- Тут выводим саму пагинацию -->
		<div class="container text-center">
			<div class="row">
				<nav>
				  <ul class="pagination">
				    <?php if ($data['pagination']['active'] != 1) { ?>
				    <li>
				      <a href="<?=$data['pagination']['url'].'&category='.$data['pagination']['category']?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; &laquo; &laquo;</span>
				      </a>
				    </li>
				    <li>
				      <a href="<?php if ($data['pagination']['active'] == 2) { ?><?=$data['pagination']['url'].'&category='.$data['pagination']['category']?><?php } else { ?><?=$data['pagination']['url_page'].($data['pagination']['active'] - 1).'&category='.$data['pagination']['category']?><?php } ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php } ?>
				    <li>

				     <?php for ($i = $data['pagination']['start']; $i <= $data['pagination']['end']; $i++) { ?>
				    <?php if ($i == $data['pagination']['active']) { ?><li><span><?=$i?></span></li><?php } else { ?><li><a href="<?php if ($i == 1) { ?><?=$data['pagination']['url'].'&category='.$data['pagination']['category']?><?php } else { ?><?=$data['pagination']['url_page'].$i.'&category='.$data['pagination']['category']?><?php } ?>"><?=$i?></a></li><?php } ?>
				    <?php } ?>
				    <?php if ($data['pagination']['active'] != $data['pagination']['count_pages']) { ?>
				</li>
				    <li>
				      <a href="<?=$data['pagination']['url_page'].($data['pagination']['active'] + 1).'&category='.$data['pagination']['category']?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				    <li>
				      <a href="<?=$data['pagination']['url_page'].$data['pagination']['count_pages'].'&category='.$data['pagination']['category']?>" aria-label="Next">
				        <span aria-hidden="true">&raquo; &raquo; &raquo;</span>
				      </a>
				    </li>
				    <?php } ?>
				  </ul>
				</nav>
			</div>
		</div>
<?php  ?>

