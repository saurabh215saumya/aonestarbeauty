  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Template List</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo ucfirst($controller); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo base_url($controller.'/addtemplate'); ?>" class="btn btn-primary pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
		<?php echo $this->session->flashdata('response'); ?>
            <?php if(!empty($alltemplate)) { //echo '<pre>'; print_r($allcircle); die;?>		
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
<!--                  <th>ID</th>-->
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($alltemplate as $row) { 
          		    if($row['status']) {
          			      $status = '<p class="changestatus" id="display__'.$row["id"].'"><span statusid='.$row["id"].' statusvalue='.$row["status"].' controllername='.$controller.' style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span></p>';
          		    } else {
          			       $status = '<p class="changestatus" id="display__'.$row["id"].'"><span statusid='.$row["id"].' statusvalue='.$row["status"].' controllername='.$controller.' style="color: #ff0000; cursor: pointer;" title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span></p>';
          		    }
		            ?>
                <tr>
                  <!-- <td><?php //echo $row['id']; ?></td> -->
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['subject']; ?></td>
                  <td><?php echo $row['comment']; ?></td>
				          <td><img id="loderid_<?php echo $row['id'] ?>" src="<?php echo SHOW_IMAGE_LODER_ICON_PATH; ?>" height="80px" width="100px" style="display: none" ><?php echo $status; ?></td>
                  <td>
                  
                  <a data-toggle="tooltip" class="btn btn-warning" title="Edit" href="<?php echo BASE_URL.'/emailtemplate/edit/'.$row['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"  ></i>
                  </a>
                  <a onclick="return deleteconfirm();"  data-toggle="tooltip" class="btn btn-danger" title="Delete" href="<?php echo BASE_URL.'/emailtemplate/delete/'.$row['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>
                  </a>                  
                  </td>
                </tr>
                <?php } ?>                
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

  
  
