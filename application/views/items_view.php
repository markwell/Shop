
		<!-- тут выводим сам объект в соответствии с номером текущего элемента в пагинации -->
		'<div class="container text-center">
			<div class="row">
				<div class="media">
					<a class="media-left media-middle" href="#"><img src="<?=$data['items'][$data['pagination']['active']]['image']?>" alt="Блюдо"></a>
					<div class="media-body">
						<h4 class="media-heading">
							<?=$data['items'][$data['pagination']['active']]['name']?>
						</h4>
						<?=$data['items'][$data['pagination']['active']]['description']?>
					</div>
				</div>
			</div>
		</div>

		<!-- Тут выводим саму пагинацию -->
		<div class="container text-center">
			<div class="row">
				<nav>
				  <ul class="pagination">
				    <li>
				      <a href="<?=$data['pagination']['url']?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; &laquo; &laquo;</span>
				      </a>
				    </li>
				    <li>
				      <a href="<?php if ($data['pagination']['active'] == 2) { ?><?=$data['pagination']['url']?><?php } else { ?><?=$data['pagination']['url_page'].($data['pagination']['active'] - 1)?><?php } ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li>

				     <?php for ($i = $data['pagination']['start']; $i <= $data['pagination']['end']; $i++) { ?>
				    <?php if ($i == $data['pagination']['active']) { ?><li><span><?=$i?></span></li><?php } else { ?><li><a href="<?php if ($i == 1) { ?><?=$data['pagination']['url']?><?php } else { ?><?=$data['pagination']['url_page'].$i?><?php } ?>"><?=$i?></a></li><?php } ?>
				    <?php } ?>
				    <?php if ($data['pagination']['active'] != $data['pagination']['count_pages']) { ?>
				</li>
				    <li>
				      <a href="<?=$data['pagination']['url_page'].($data['pagination']['active'] + 1)?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				    <li>
				      <a href="<?=$data['pagination']['url_page'].$data['pagination']['count_pages']?>" aria-label="Next">
				        <span aria-hidden="true">&raquo; &raquo; &raquo;</span>
				      </a>
				    </li>
				    <?php } ?>
				  </ul>
				</nav>
			</div>
		</div>
<?php  ?>

