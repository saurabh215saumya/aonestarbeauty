<?php //echo '<pre>'; print_r($details); die; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Edit Location</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Edit Location</li>
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
			<?php echo form_open_multipart($controller.'/update_location'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <input type="hidden" name="location_id" value="<?php echo $details['id']; ?>">
			    <div class="form-group">
					<div class="form-group">
						<label>Select City<span style="color: #ff0000">*</span></label>
						<select class="form-control" id="location_city" name="location_city" required>
						    <option value="">Select City</option>
						    <option value="landon" selected>Landon</option>
						</select>
						<?php echo form_error('location_city'); ?>
				    </div>
			    </div>


			    <div class="form-group">
					<label for="name">Location Name<span style="color: #ff0000">*</span></label>
					<input class="form-control" name="location_name" id="location_name" placeholder="Location Name" type="text" value="<?php echo $details['location']; ?>" required>
					<?php echo form_error('location_name'); ?>				
			    </div>


			    <div class="form-group">
					<label for="name">Location Slug<span style="color: #ff0000">*</span></label>
					<input class="form-control" name="location_slug" id="location_slug" placeholder="Location Slug" type="text" value="<?php echo $details['location_slug']; ?>" required>
					<?php echo form_error('location_slug'); ?>				
			    </div>


			    <?php if(!empty($allservicepages)){
			    	$servicesArr = explode(",", $details['services_id']);
			    ?>
			    <div class="form-group">
					<label for="name">Add Services<span style="color: #ff0000"></span>&nbsp;&nbsp;<input type="checkbox" class="checkAll" id="select_all"/></label>
				</br>
					<?php foreach($allservicepages as $servicepages){ ?>
						<input type="checkbox" name="services[]" value="<?php echo $servicepages['id']; ?>" <?php if(in_array($servicepages['id'], $servicesArr)){ echo 'checked="checked"'; } ?> class="checkboxes" /> <?php echo $servicepages['service_name']; ?></br>
					<?php } ?>
			    </div>
			    <?php } ?>

			    
			    <div class="form-group">
				<label>Please Choose Status<span style="color: #ff0000">*</span></label>
				<select class="form-control" id="status" name="status">
				    <option value="">Select Status</option>
				    <option <?php echo $details['status']==1?'selected':''; ?> value="1">Active</option>
				    <option <?php echo $details['status']==0?'selected':''; ?> value="0">In Active</option>
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