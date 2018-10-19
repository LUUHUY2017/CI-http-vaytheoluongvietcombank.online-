    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Edit Forms</h1>
          <p>Edit infomation</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Edit Forms</a></li>
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
              <?php foreach ($postlist as $value): ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Title . . ." name="txtTitle" autocomplete="off" value="<?=$value['Title']?>" onkeyup="changetoslug(this.value)">
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <input class="form-control" type="text" placeholder="Enter Description. . ." name="txtDescription" autocomplete="off" value="<?=$value['Description']?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Content</label>
                  <textarea id="noidung" name="txtContent"><?=$value['Content']?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Thumbnail</label>
                </div>
                  <img src="<?=base_url().'media/'.$value['Thumbnail']?>" width="50%">
                  <input class="form-control" type="file" name="txtThumbnail">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Slug</label>
                  <input class="form-control" id="slugUrl" type="text" placeholder="Enter Key word. . ." name="txtSlug" autocomplete="off" value="<?=$value['Slug']?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Categories ID</label>
                  <select class="form-control" name="cbbCat_id" id="">
                    <?php foreach ($categorieslist as $val): ?>
                      <?php if($val['Slug'] != '' && $val['Slug'] != 'lien-he'){ ?>
                      <option value="<?=$val['ID']?>" <?php if($val['ID'] == $value['Cat_id']) echo 'selected'; ?>><?=$val['Name']?></option>
                    <?php } ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="post"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </form>
               <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </main>

