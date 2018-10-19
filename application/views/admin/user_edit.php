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
            <h3 class="tile-title">User Infomation Form</h3>
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
              <?php foreach ($user_info as $value): ?>
              <form action="user/edit/<?= $value['ID'] ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label class="control-label">Username</label>
                  <input class="form-control" type="text" placeholder="Enter user name . . ." name="txtusername" autocomplete="off" value="<?=$value['Username']?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input class="form-control" type="password" placeholder="Enter user password . . ." autocomplete="off" name="txtpassword" value="<?=$value['Password']?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Avatar</label>
                </div>
                <div class="form-group">
                  <label for=""><img src="<?=base_url().'media/'.$value['Avatar']?>" alt="" width="30%" display="block"></label>
                  <input class="form-control" type="file" placeholder="Enter user password . . ." autocomplete="off" name="txtavatar" >
                </div>
                <div class="form-group">
                  <label class="control-label">Role</label>
                  <input class="form-control" type="number" placeholder="Choose Permission . . ." min="0" max="1" name="txtrole" value="<?=$value['Role']?>">
                </div>
                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="user"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </form>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </main>