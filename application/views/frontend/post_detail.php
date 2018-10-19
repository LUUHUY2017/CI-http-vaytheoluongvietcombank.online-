<link rel="stylesheet" href="<?=base_url().'media/css/style_detail.css' ?>">
<link rel="stylesheet" href="<?=base_url().'media/css/style_postdetail.css' ?>">
				<div id="khungbaiviet">
					<div class="row">
						<div class="control">
							<div class="form-group">
								<?php foreach ($post_categories as $value): ?>
									
								
								<label for=""><a href="">trang chủ</a>&nbsp<i class="fa fa-angle-double-right"></i><a href="<?=$value['Slug']?>"><?=$value['Name']?></a>&nbsp<i class="fa fa-angle-double-right">&nbsp<?=$value['Title']?></i></label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-xl-12">
							<p class="text-center"><b><?=$value['Title']?></b></p>
							<div class="col-12 col-sm-12 col-md-12 col-xl-12 text-center anhbiabaiviet">
								<img src="<?=base_url().'media/'.$value['Thumbnail']?>" alt="">
							</div>
							<p><?=$value['Description']?></p>
						</div>
					</div>
				</div>
				<div id="khungbaiviet">
					<div class="row motachitiet">
						<div class="control">
							<div class="form-group">
								<label for=""><b>Mô tả chi tiết</b></label>
							</div>
						</div>
						<div class="form-group">
							<p class="text-center"><b><?=$value['Title']?></b></p>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 chitietbaiviet">
								<?=$value['Content']?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach ?>
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