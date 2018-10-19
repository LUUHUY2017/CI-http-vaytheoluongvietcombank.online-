
					<div class="col-md-12 slidebar">
						<div class="carousel">
						<?php foreach ($slider as $value): ?>
						  <div><a href="<?=$value['Url'].'.html'?>"><img src="<?=base_url().'media/'.$value['Image']?>" alt="" class=""></a></div>
						<?php endforeach ?>
						</div>
					</div>
					<?php foreach ($categories as $value): ?>
						
					<?php if($value['Slug']!='' && $value['Slug'] != 'lien-he') { ?>
					<div class="col-md-12 chuyenmuc" id="chuyenmuc-<?=$value['ID']?>">
						<div class="row">
							<div class="tieude">
								<a href="<?=$value['Slug']?>"><?=$value['Name']?></a>
								<a href="<?=$value['Slug']?>">Xem thêm</a>
							</div>
						</div>
						<div class="row">
							
								<?php
									$filter = array(
										'Cat_id' => $value['ID']
									);
									$post = $this->post_model->show_all($filter);
									foreach ($post as $val): ?>	
								<div class="col-sm-6 col-md-6 col-lg-4 khoibaiviet">
								<div class="form-group">
									<a href="<?=$val['Slug']?>"><img src="<?=base_url().'media/'.$val['Thumbnail']?>" alt=""></a>
								</div>
								<div class="form-group">
									<a href="#"><h5><?=$val['Title']?></h5></a>
								</div>
								</div>
								<?php endforeach ?>
							
						</div>
					</div>
				<?php } ?>
					<?php endforeach ?>
				</div>
		</section>
	</div>
	<footer>
		<p><?=$config[0]['Description']?></p>
	</footer>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/myjs.js"></script>
</body>
</html>