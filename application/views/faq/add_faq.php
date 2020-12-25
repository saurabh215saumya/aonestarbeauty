<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Add Faq</h1>
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
			<?php echo form_open_multipart($controller.'/add_newfaq'); ?>
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

			    <div class="form-group">
					<label for="name">Question<span style="color: #ff0000"></span></label>
					<input class="form-control" id="question" name="question" placeholder="Question" type="text" value="<?php echo set_value('question') ?>">
					<?php echo form_error('question'); ?>
			    </div>

			    <!-- <div class="form-group">
					<label for="name">Answer<span style="color: #ff0000"></span></label>
					<input class="form-control" id="answer" name="answer" placeholder="Answer" type="text" value="<?php echo set_value('answer') ?>">
					<?php echo form_error('answer'); ?>
			    </div> -->

			    <div class="form-group">
				<label for="description">Answer<span style="color: #ff0000"></span></label>
					<textarea name="answer" id="editor13" value="<?php echo set_value('answer') ?>"></textarea>
					<?php echo form_error('answer'); ?>
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
