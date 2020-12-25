  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Meeting Details</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"><a href="<?php echo base_url($controller);?>"><?php echo ucfirst($controller); ?></a></li>
        <li class="active">Meeting Details</li>
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
                  <th>Page Name</th>
                  <td><?php echo $details['page_name']; ?></td>
                </tr>
                <tr>
                  <th>Content</th>
                  <td><?php echo $details['content']; ?></td>
                </tr>
                              
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
