<link rel="stylesheet" href="<?=base_url().'media/css/style_detail.css' ?>">
				<div class="row">
					<div class="control">
						<div class="form-group">
							<label for=""><a href="">trang chủ</a>&nbsp<i class="fa fa-angle-double-right"></i>&nbsp<span>
								<?php foreach ($categories as $value): ?>
									<?php if($value['Slug'] == $this->uri->segment(1))
									echo ucfirst($value['Name']); ?>
							<?php endforeach ?></span></label>
						</div>
					</div>
				</div>
				<?php foreach ($config as $value): ?>
				<div class="row baiviet" width="100%">
					<div class="form-group">
						<label for=""><h2><?=$value['Title']?></h2></label>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</section>
	</div>
	<footer>
		<p><?=$config[0]['Description']?></p>
	</footer>
	<script type="text/javascript" src="<?=base_url().'media'?>/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<?=base_url().'media'?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url().'media'?>/js/slick.min.js"></script>
	<script type="text/javascript" src="<?=base_url().'media'?>/js/myjs.js"></script>
</body>
</html>