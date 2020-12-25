  <?php // echo '<pre>'; print_r($allbrands); die; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Keyword List</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo 'Menu'; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div id="successMsg" style="text-align:center; color: green;"></div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo base_url($controller.'/addkeyword'); ?>" class="btn btn-primary pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo $this->session->flashdata('response'); ?>
            <?php if(!empty($allkeywords)) { ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Keyword</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="checkboxes">
                <?php $i=1; foreach($allkeywords as $row) { 
                  
                  if($row['status']) {
                    $status = '<p class="changestatus" id="display__'.$row["id"].'"><span statusid='.$row["id"].' statusvalue='.$row["status"].' controllername='.$controller.' style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span></p>';
                      } else {
                    $status = '<p class="changestatus" id="display__'.$row["id"].'"><span statusid='.$row["id"].' statusvalue='.$row["status"].' controllername='.$controller.' style="color: #ff0000; cursor: pointer;" title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span></p>';
                  }
              

                  // if(file_exists(UPLOAD_PACKAGE_PATH.$row['image'])) {
                  //     $img = SHOW_PACKAGE_PATH.$row['image'];
                  // } else {
                  //   $img = SHOW_PACKAGE_PATH.'noimage.png';
                  // }
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['keyword_name']; ?></td>
                  <!-- <td><img src="<?php echo $img; ?>" height="80px" width="100px"></td> -->
                  <td>
                    <img id="loderid_<?php echo $row['id'] ?>" src="<?php echo SHOW_IMAGE_LODER_ICON_PATH; ?>" height="80px" width="100px" style="display: none" >
                    <?php echo $status; ?>                      
                  </td>
                  <td>
                    <a data-toggle="tooltip" class="btn btn-warning" title="Edit" href="<?php echo BASE_URL.'/keyword/edit/'.$row['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"  ></i>
                    </a>
                    <a onclick="return deleteconfirm();" class="btn btn-danger" title="Delete" href="<?php echo BASE_URL.'/keyword/delete/'.$row['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
