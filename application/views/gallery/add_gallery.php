<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Add Gallery</h1>
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
			<?php echo form_open_multipart($controller.'/add_newgallery'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
   			    
			    <!-- <div class="form-group">
				<label for="address_1">Type<span style="color: #ff0000">*</span></label>
				<select class="form-control" id="banner_type" name="banner_type">
				    <option value="">Select Type</option>
				    <option value="1">Slider Image</option>
				    <option value="2">Middle Image</option>
				</select>
				<?php echo form_error('banner_type'); ?>
			    </div> -->

			    <!-- <div class="form-group">
					<label for="name">Title<span style="color: #ff0000"></span></label>
					<input class="form-control" id="title" name="title" placeholder="Image Title" type="text" value="<?php echo set_value('title') ?>">
					<?php echo form_error('title'); ?>
			    </div> -->

			   	<div class="control-group">
				  <label class="control-label">Image:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file" id="image_file" required/>
					</div>
					<!-- <div style="color: red">*Upload Image size should be 750(Height)*1920(Width).</div> -->
				</div>  

				<!-- <div class="form-group">
				<label for="description">Description<span style="color: #ff0000"></span></label>
					<textarea name="description" id="editor" value="<?php echo set_value('description') ?>"></textarea>
					<?php echo form_error('description'); ?>
				</div> -->

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
