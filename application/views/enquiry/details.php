  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Enquiry Details</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url($controller);?>"><?php echo ucfirst($controller); ?></a></li>
        <li class="active">Enquiry Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <?php if(!empty($details)) { ?>
              <table class="table table-bordered">
                <tbody>                
                <tr>
                  <th>Name</th>
                  <td><?php echo $details['name']; ?></td>
                </tr>
                <tr>
                  <th>Mobile Number</th>
                  <td><?php echo $details['phone']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $details['email']; ?></td>
                </tr>
                <tr>
                  <th>Subject</th>
                  <td><?php echo $details['subject']; ?></td>
                </tr>
                <tr>
                  <th>Message</th>
                  <td><?php echo $details['message']; ?></td>
                </tr>
                
                </tbody>
              </table>

              <?php } else { ?>
              <div style="text-align: center;">No Record found</div>
              <?php } ?>
<?php //echo '<pre>'; print_r($privacydetails); die; ?>
              


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
