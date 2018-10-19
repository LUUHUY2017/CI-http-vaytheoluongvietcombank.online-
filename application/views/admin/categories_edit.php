    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Forms</h1>
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
            <h3 class="tile-title">Categories Form</h3>
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
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <?php foreach ($categories as $value): ?>
                  
                
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter user name . . ." name="txtname" autocomplete="off" value="<?=$value['Name']?>" onchange="changetoslug(this.value)">
                </div>
                <div class="form-group">
                  <label class="control-label">Slug</label>
                  <input class="form-control" placeholder="Enter slug . . ." autocomplete="off" id="slugUrl" name="txtslug" value="<?=$value['Slug']?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Parent_id</label>
                  <select name="cbbparent_id" id="" class="form-control">
                    <option value=""></option>
                  </select>
                </div>
                <?php endforeach ?>
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add New</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="categories"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

