<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Add Template</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Add Template</li>
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
			<?php echo form_open_multipart($controller.'/add_newtemplate'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <div class="form-group">
				<label for="name">Name<span style="color: #ff0000">*</span></label>
				<input class="form-control" id="name" name="name" placeholder="Template Name" type="text" value="<?php echo set_value('name') ?>">
				<?php echo form_error('name'); ?>
			    </div>

			    <div class="form-group">
				<label for="name">Subject<span style="color: #ff0000">*</span></label>
				<input class="form-control" id="subject" name="subject" placeholder="Template Subject" type="text" value="<?php echo set_value('subject') ?>">
				<?php echo form_error('subject'); ?>
			    </div>

			    <div class="form-group">
				<label for="name">Comment<span style="color: #ff0000">*</span></label>
				<input class="form-control" id="comment" name="comment" placeholder="Template Comment" type="text" value="<?php echo set_value('comment') ?>">
				<?php echo form_error('comment'); ?>
			    </div>

			    <div class="form-group">
				<label for="description">Description<span style="color: #ff0000">*</span></label>
					<textarea class="form-control" name="description" id="editor" value="<?php echo set_value('description') ?>"></textarea>
					<?php echo form_error('description'); ?>
				</div>


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
