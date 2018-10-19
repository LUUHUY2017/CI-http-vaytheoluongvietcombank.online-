<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Config Infomation Table</h1>
          <p>Table to display Config Infomation</p>
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
                    <th>Name</th>
                    <th>Title</th>
                    <th>Logo</th>
                    <th>Description</th>
                    <th>Keyword</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($configlist as $value): ?>
                  <tr>
                    <td><?= $value['ID'] ?></td>
                    <td><a href="config/edit/<?= $value['ID'] ?>"><?= $value['Name'] ?></a></td>
                    <td><?= $value['Title'] ?></td>
                    <td><img src="<?=base_url().'media/'.$value['Logo'] ?>" alt="" width="100%" height= "70%"></td>
                    <td><?= $value['Description'] ?></td>
                    <td><?= $value['Key_word'] ?></td>
                    <td><?= $value['Phone'] ?></td>
                    <td><a href="config/delete/<?= $value['ID'] ?>"><i class="fa fa-2x fa-ban"></i></a></td>
                  </tr>
                <?php endforeach ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <a href="config/add" class="btn btn-outline-primary">Add New</a>
        </div>
      </div>