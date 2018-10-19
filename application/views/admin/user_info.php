<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> User Infomation Table</h1>
          <p>Table to display User Infomation</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php
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
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($user_info as $value): ?>
                  <tr>
                    <td><?= $value['ID'] ?></td>
                    <td><a href="user/edit/<?= $value['ID'] ?>"><?= $value['Username'] ?></a></td>
                    <td><?= $value['Password'] ?></td>
                    <td><img src="<?=base_url().'media/'.$value['Avatar']?>"></td>
                    <td><?= $value['Role'] ?></td>
                    <td><a href="user/delete/<?= $value['ID'] ?>"><i class="fa fa-2x fa-ban"></i></a></td>
                  </tr>
                <?php endforeach ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <a href="user/add" class="btn btn-outline-primary">Add New</a>
        </div>
      </div>