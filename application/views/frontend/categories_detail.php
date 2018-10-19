<link rel="stylesheet" href="<?=base_url().'media/css/style_detail.css' ?>">
				<div id="khungbaiviet">
				<div class="row" id="broadcast">
					<div class="control">
						<div class="form-group">
							<label for=""><a href="">trang chủ</a>&nbsp<i class="fa fa-angle-double-right"></i>&nbsp<span>
								<?php foreach ($categories as $value): ?>
									<?php if($value['Slug'] == $this->uri->segment(1))
									echo ucfirst($value['Name']); ?>
							<?php endforeach ?></span></label>
						</div>
						<div class="form-group">
							<label for=""><button class="btn btn-default btnlist doimau"><i class="fa fa-list"></i>List</button><button class="btn btn-default btngrid"><i class="fa fa-th-large"></i>Grid</button></label>
						</div>
					</div>
				</div>
				<?php foreach ($post_categories as $value): ?>
				<div class="row baiviet">
					<div class="imagebaiviet">
						<a href="<?=$value['Slug']?>"><img src="<?=base_url().'media/'.$value['Thumbnail']?>"></a>
					</div>
					<div class="tomtatbaiviet">
						<a href="<?=$value['Slug']?>"><h5><?=$value['Title']?></h5></a>
						<small><?=$value['Create_at']?></small>
						<p class="noidung"><?=$value['Description']?></p>
					</div>
					
				</div>
				<?php endforeach ?>

			</div>
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