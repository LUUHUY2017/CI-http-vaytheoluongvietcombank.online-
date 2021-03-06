    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add New Forms</h1>
          <p>Add new infomation</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Add New Forms</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Post Form</h3>
            <div class="tile-body">
              <?php
                if(validation_errors())
                {
                  echo validation_errors('<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>','
                    </strong></div>');
                }
                if($this->session->flashdata('error_msg'))
                {
                  echo '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>'.$this->session->flashdata('error_msg').'
                    </strong></div>';
                }
                if($this->session->flashdata('success_msg'))
                {
                  echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>'.$this->session->flashdata('success_msg').'
                    </strong></div>';
                }
                if(isset($error))
                {
                    echo '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>'.$error.'
                    </strong></div>';
                }
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Title . . ." name="txtTitle" autocomplete="off" value="<?php echo set_value('txtTitle'); ?>" onkeyup="changetoslug(this.value)">
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <input class="form-control" type="text" placeholder="Enter Description. . ." name="txtDescription" autocomplete="off" value="<?php echo set_value('txtDescription'); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Content</label>
                  <textarea class="form-control" id="noidung" name="txtContent" autocomplete="off" value="<?php echo set_value('txtContent'); ?>"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Thumbnail</label>
                  <input class="form-control" type="file" name="txtThumbnail">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Slug</label>
                  <input class="form-control" id="slugUrl" type="text" placeholder="Enter Key word. . ." name="txtSlug" autocomplete="off" value="<?php echo set_value('txtSlug'); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Categories ID</label>
                  <select class="form-control" name="cbbCat_id" id="">
                    <?php foreach ($categorieslist as $value): ?>
                      <?php if($value['Slug'] != ''){ ?>
                      <option value="<?=$value['ID']?>"><?=$value['Name']?></option>
                    <?php } ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add New</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="post"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

