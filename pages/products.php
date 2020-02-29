<?php
	if (!defined('INITIALIZED'))
		exit;

	$category = (string) $_POST['category'];

	if (isset($_REQUEST['filter']))
		$category = "all";

	foreach ($SQL->query('SELECT * FROM `products`;') as $product) {
		$main_content .= '
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="panel-group">
						<div class="panel">
							<div class="panel-heading">'.$product['name'].'</div>
							<div class="panel-body"></div>
						</div>
					</div>
				</div>
			</div>
		</div>';
	}