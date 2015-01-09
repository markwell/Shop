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
					</div>
				</div>
			</div>
		</div>';
    }
?>

<div class="container text-center">
	<div class="row">
		<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li class="active"><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>
</div>