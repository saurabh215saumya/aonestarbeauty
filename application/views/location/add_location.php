<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Add Location</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Add <?php echo ucfirst($controller); ?></li>
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
			<?php echo form_open_multipart($controller.'/add_newlocation'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <div class="form-group">
					<label>Select Category<span style="color: #ff0000">*</span></label>
					<select class="form-control" id="location_city" name="location_city" required>
					    <option value="">Select City</option>
					    <option value="landon" selected>Landon</option>
					</select>
					<?php echo form_error('location_city'); ?>
			    </div>


			    <div class="form-group">
					<label for="name">Location Name<span style="color: #ff0000"></span></label>
					<input class="form-control" id="location_name" name="location_name" placeholder="Location Name" type="text" value="<?php echo set_value('location_name') ?>">
					<?php echo form_error('location_name'); ?>
			    </div>

			    <div class="form-group">
					<label for="name">Location Slug<span style="color: #ff0000"></span></label>
					<input class="form-control" id="location_slug" name="location_slug" placeholder="Location Slug" type="text" value="<?php echo set_value('location_slug') ?>">
					<?php echo form_error('location_slug'); ?>
			    </div>

			    <?php if(!empty($allservicepages)){ ?>
			    <div class="form-group">
					<label for="name">Add Services<span style="color: #ff0000"></span>&nbsp;&nbsp;<input type="checkbox" class="checkAll" id="select_all"/></label>
				</br>
					<?php foreach($allservicepages as $servicepages){ ?>
						<input type="checkbox" name="services[]" value="<?php echo $servicepages['id']; ?>" class="checkboxes" /> <?php echo $servicepages['service_name']; ?></br>
					<?php } ?>
			    </div>
			    <?php } ?>

			    <div class="form-group">
				<label>Please Choose Status<span style="color: #ff0000">*</span></label>
				<select class="form-control" id="status" name="status">
				    <option value="">Select Status</option>
				    <option value="1">Active</option>
				    <option value="0">In Active</option>
				</select>
				<?php echo form_error('status'); ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
	$('.checkAll').on('click',function(){
        $('.checkboxes').prop('checked',$(this).prop("checked"));
    });
</script>
