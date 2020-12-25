<?php //echo '<pre>'; print_r($details); die; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Edit FAq</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Edit Faq</li>
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
			<?php echo form_open_multipart($controller.'/update_faq'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <input type="hidden" name="faq_id" value="<?php echo $details['id']; ?>">

			    <div class="form-group">
				<label for="name">Question<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="question" id="question" placeholder="Faq Question" type="text" value="<?php echo $details['question']; ?>" required>
				<?php echo form_error('question'); ?>				
			    </div>

			    <!-- <div class="form-group">
				<label for="name">Answer<span style="color: #ff0000">*</span></label>
				<input class="form-control" name="answer" id="answer" placeholder="Faq Answer" type="text" value="<?php echo $details['answer']; ?>" required>
				<?php echo form_error('answer'); ?>				
			    </div> -->

			    <div class="form-group">
					<label for="description">Answer<span style="color: #ff0000">*</span></label>
					<textarea class="form-control" name="answer" id="editor13" value=""><?php echo $details['answer']; ?></textarea>
					<?php echo form_error('answer'); ?>
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
