<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Post Infomation Table</h1>
          <p>Table to display Post Infomation</p>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Slug</th>
                    <th>Create at</th>
                    <th>Categories ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($postlist as $value): ?>
                  <tr>
                    <td><?= $value['ID'] ?></td>
                    <td><a href="post/edit/<?= $value['ID'] ?>"><?= $value['Title'] ?></a></td>
                    <td height="100px"><?= $value['Description'] ?></td>
                    <td><img src="<?=base_url().'media/'.$value['Thumbnail'] ?>" alt="" width="100%"></td>
                    <td><?= $value['Slug'] ?></td>
                    <td><?= $value['Create_at'] ?></td>
                    <td><?= $value['Cat_id'] ?></td>
                    <td><a href="post/delete/<?= $value['ID'] ?>"><i class="fa fa-2x fa-ban"></i></a></td>
                  </tr>
                <?php endforeach ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <a href="post/add" class="btn btn-outline-primary">Add New</a>
        </div>
      </div>