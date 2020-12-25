<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Edit Package</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Edit Package</li>
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
			<?php echo form_open_multipart($controller.'/update_template'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <input type="hidden" name="template_id" value="<?php echo $details['id']; ?>">
			    <div class="form-group">
				<label for="name">Name<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="name" id="name" placeholder="Template Name" type="text" readonly="readonly" value="<?php echo $details['name']; ?>">
				<?php echo form_error('name'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Subject<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="subject" id="subject" placeholder="Subject Name" type="text" value="<?php echo $details['subject']; ?>">
				<?php echo form_error('subject'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Comment<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="comment" id="comment" placeholder="Template Comemnt" type="text" value="<?php echo $details['comment']; ?>">
				<?php echo form_error('comment'); ?>				
			    </div>

			    <div class="form-group">
				<label for="description">Description<span style="color: #ff0000">*</span></label>
					<textarea class="form-control" name="description" id="editor" value=""><?php echo $details['description']; ?></textarea>
					<?php echo form_error('description'); ?>
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
