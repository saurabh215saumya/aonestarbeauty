  <?php // echo '<pre>'; print_r($allbrands); die; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Enquiry List</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo ucfirst($controller); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div id="successMsg" style="text-align:center; color: green;"></div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
            <?php echo $this->session->flashdata('response'); ?>
            <?php if(!empty($allenquiries)) { ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="checkboxes">
                <?php $i=1; foreach($allenquiries as $row) { 
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['subject']; ?></td>
                  <td><?php echo $row['message']; ?></td>
                  <td>
                    <a class="btn btn-primary" title="View" href="<?php echo BASE_URL.'/enquiry/details/'.$row['id'] ?>"><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a>
                    <a onclick="return deleteconfirm();" class="btn btn-danger" title="Delete" href="<?php echo BASE_URL.'/enquiry/delete/'.$row['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
