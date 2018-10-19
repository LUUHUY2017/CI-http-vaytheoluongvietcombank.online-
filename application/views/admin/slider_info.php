<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Tag Infomation Table</h1>
          <p>Table to display tag infomation</p>
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
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Url</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($sliderlist as $value): ?>
                  <tr>
                    <td><?= $value['ID'] ?></td>
                    <td><a href="slider/edit/<?= $value['ID'] ?>"><?= $value['Url'] ?></a></td>
                    <td><img src="<?= base_url().'media/'.$value['Image'] ?>" width="90%"></td>
                    <td><?php if($value['Status']!=0)
                    {
                      echo '<span class="badge badge-primary">Visible</span>';
                    }
                    else
                    {
                      echo '<span class="badge badge-secondary">Invisible</span>';
                    }
                    ?></td>
                    <td><a href="slider/delete/<?= $value['ID'] ?>"><i class="fa fa-1x fa-ban"></i></a></td>
                  </tr>
                <?php endforeach ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <a href="slider/add" class="btn btn-outline-primary">Add New</a>
        </div>
      </div>