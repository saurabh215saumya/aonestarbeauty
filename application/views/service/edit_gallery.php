<?php //echo '<pre>'; print_r($product_id); die; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Edit Gallery Image</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Edit Gallery Image</li>
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
			<?php echo form_open_multipart($controller.'/update_gallery'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <input type="hidden" name="gallery_id" value="<?php echo $details['id']; ?>">
			    <input type="hidden" name="service_id" value="<?php echo $details['service_id']; ?>">

			    <div class="control-group">
				  <label class="control-label">Image:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file" id="image_file"/>
						<input type="hidden" name="image_file_name" id="image_file_name" value="<?php echo $details['image'];?>"/>
						<?php if(!empty($details['image'])) {
							echo '<div><img src="'.BASE_URL.'/uploads/services/'.$details['image'].'" width="25%"/></div>';
						} ?>
					</div>
					<div style="color: red">*Upload Image size should be 1020*1000.</div>
				</div>
			    
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
