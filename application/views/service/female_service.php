  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sub Menu List</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sub Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo base_url($controller.'/addservice'); ?>" class="btn btn-primary pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
		<?php echo $this->session->flashdata('response'); ?>
            <?php if(!empty($allservice)) { //echo '<pre>'; print_r($allinterest); die;?>		
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Menu</th>
                  <th>Sub Menu</th>
                  <th>Image</th>
                  <th>Banner Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($allservice as $row) { 
                  
          		    if($row['status']) {
          			      $status = '<p class="changestatus" id="display__'.$row["id"].'"><span statusid='.$row["id"].' statusvalue='.$row["status"].' controllername='.$controller.' style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span></p>';
          		    } else {
          			       $status = '<p class="changestatus" id="display__'.$row["id"].'"><span statusid='.$row["id"].' statusvalue='.$row["status"].' controllername='.$controller.' style="color: #ff0000; cursor: pointer;" title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span></p>';
          		    }

                  if($row['image'] != ''){
                    if(file_exists(UPLOAD_SERVICE_PATH.$row['image'])) {
                      $img = SHOW_SERVICE_PATH.$row['image'];
                    } else {
                      $img = UPLOAD_SERVICE_NO_IMAGE;
                    }
                  } else {
                    $img = UPLOAD_SERVICE_NO_IMAGE;
                  }

                  if($row['service_banner_image'] != ''){
                    if(file_exists(UPLOAD_SERVICE_PATH.$row['service_banner_image'])) {
                      $banner_img = SHOW_SERVICE_PATH.$row['service_banner_image'];
                    } else {
                      $banner_img = UPLOAD_SERVICE_NO_IMAGE;
                    }
                  } else {
                    $banner_img = UPLOAD_SERVICE_NO_IMAGE;
                  }

		            ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo getPackageName($row['package_id']); ?></td>
                  <td><?php echo $row['service_name']; ?></td>
                  <td><img alt="image" height="50" width="60" src="<?php echo $img; ?>"></td>
                  <td><img alt="banner image" height="50" width="60" src="<?php echo $banner_img; ?>"></td>
				          <td><img id="loderid_<?php echo $row['id'] ?>" src="<?php echo SHOW_IMAGE_LODER_ICON_PATH; ?>" height="80px" width="100px" style="display: none" ><?php echo $status; ?></td>
                  <td>
                  <!-- <a data-toggle="tooltip" class="btn btn-success" title="Add Gallery Image" href="<?php echo BASE_URL.'/service/addgallery/'.$row['id'] ?>"><i class="fa fa-plus" aria-hidden="true"  ></i>
                  </a> -->

                  <a data-toggle="tooltip" class="btn btn-warning" title="Edit Service" href="<?php echo BASE_URL.'/service/edit/'.$row['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"  ></i>
                  </a>

                  <!-- <a data-toggle="tooltip" class="btn btn-primary" title="View Gallery" href="<?php echo BASE_URL.'/service/gallerylist/'.$row['id'] ?>"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"  ></i>
                  </a> -->

                  <a onclick="return deleteconfirm();"  data-toggle="tooltip" class="btn btn-danger" title="Delete Product" href="<?php echo BASE_URL.'/service/delete/'.$row['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>
                  </a>                
                  </td>
                </tr>
                <?php $i++; } ?>                
                </tbody>
              </table>
              <?php } else { ?>
              <div style="text-align: center;">No Record found</div>
              <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  
  
