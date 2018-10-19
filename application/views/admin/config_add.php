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
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter user name . . ." name="txtName" autocomplete="off" value="<?php echo set_value('txtName'); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input class="form-control" type="text" placeholder="Enter Title . . ." name="txtTitle" autocomplete="off" value="<?php echo set_value('txtTitle'); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Logo</label>
                  <input class="form-control" type="file" name="txtLogo">
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <input class="form-control" type="text" placeholder="Enter Description. . ." name="txtDescription" autocomplete="off" value="<?php echo set_value('txtDescription'); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Key word</label>
                  <input class="form-control" type="text" placeholder="Enter Key word. . ." name="txtKey_word" autocomplete="off" value="<?php echo set_value('txtKey_word'); ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Phone</label>
                  <input class="form-control" type="number" placeholder="Enter Phone. . ." name="txtPhone" autocomplete="off" value="<?php echo set_value('txtPhone'); ?>">
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add New</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="config"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

