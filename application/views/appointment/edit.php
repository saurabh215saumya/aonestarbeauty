<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Edit Appointment</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Edit Appointment</li>
	</ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
	    <div class="col-xs-8">
		<div class="box">
		    <!-- /.box-header -->
		    <div class="box-body">
			<!-- form start -->
			<?php echo form_open_multipart($controller.'/update_appointment'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <input type="hidden" name="appointment_id" value="<?php echo $details['id']; ?>">
			    <div class="form-group">
				<label for="name">Name<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="name" id="name" placeholder="Full Name" type="text" value="<?php echo $details['name']; ?>" readonly>
				<?php echo form_error('name'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Email<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="email" id="email" placeholder="Email" type="text" value="<?php echo $details['email']; ?>" readonly>
				<?php echo form_error('email'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Phone<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="phone" id="phone" placeholder="Phone Number" type="text" value="<?php echo $details['phone']; ?>" readonly>
				<?php echo form_error('phone'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Appointment Date<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="appointment_date" id="appointment_date" placeholder="Appointment Date" type="date" value="<?php echo $details['appointment_date']; ?>">
				<?php echo form_error('appointment_date'); ?>				
			    </div>
			   
			    <div class="box-footer">
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			    </div>
			</div>
			<?php form_close(); ?>
		    </div>		    
		</div>
		<!-- /.box-body -->
	    </div>
	    <!-- /.box -->
        </div>
        <!-- /.col -->

	<!-- /.row -->
    </section>
    <!-- /.content -->
</div>


