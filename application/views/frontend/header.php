<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bài Test Online</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/slick.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/slick-theme.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/style_dashboard.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/reponsive.css">
	<base href="<?php echo base_url(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
	<div class="container">
		<header>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 logo">
					<img src="<?php echo base_url().'media/'. $config[0]["Logo"]; ?>" alt="<?=$config[0]['Title']?>">
				</div>
				<div class="col-6 col-sm-12 col-md-12 col-lg-12 col-xl-6 searchbox">
					<form action="" method="get">
						<input type="text" class="form-control" name="searchtext" value="" placeholder="Search...">
						<select class="form-control" name="searchoption">
							<?php foreach ($categories as $value): ?>
								<?php if($value['Slug'] != NULL){ ?>
								<option value="<?=$value['Name']?>"><?=$value['Name']?></option>
							<?php } ?>
							<?php endforeach ?>
						</select>
						<input type="submit" class="btn btn-warning" value="Search">
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-12 menu-ngang">
					<div class="nut-chuyen">
						<div class="gach"></div>
						<div class="gach"></div>
						<div class="gach"></div>
					</div>
					<ul>
						<?php 
						$segment = $this->uri->segment(1);
						$cat_post = $this->post_model->post_detail($segment);
						foreach ($categories as $value): ?>
							<li <?php if($value['Slug'] == $segment){ echo 'class="active"';}
							else if(isset($cat_post[0]['Slug']) && $value['Slug'] == $cat_post[0]['Slug'])
								echo 'class="active"'; ?>>
								<?php if($value['Slug'] != ''){ ?><a href="<?=$value['Slug']?>"><?=$value['Name']?></a></li>
							<?php }
							else { ?>
								<a href=""><?=$value['Name']?></a></li>
							<?php } ?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</header>
		<section class="main">
			<div class="row">
				<div class="col-12 col-md-3 col-lg-3 leftmain">
					<div class="row">
						<div class="tieude">
							<h4>Đăng Kí Tư Vấn</h4>	
						</div>
						<div class="col-md-12 formtuvan">
							<form action="" method="post">
								<div class="form-group">
									<label for="">Họ & Tên(*)</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Điện Thoại(*)</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Email(*)</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Tỉnh / Thành Phố(*)</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Số Tiền Cần Vay(*)</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Nội Dung Yêu Cầu(*)</label>
									<textarea class="form-control" cols="40" rows="10"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-success" value="Gửi Yêu Cầu">
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="tieude">
							<h4>Bài Viết Mới Nhất</h4>	
						</div>
						<div class="col-md-12 col-lg-12 baivietmoi">
							<ul>
								<?php foreach ($post_newest as $value): ?>
									<li><a href="<?=$value['Slug']?>"><?=$value['Title']?></a></li>
								<?php endforeach ?>
							</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-lg-9 rightmain">