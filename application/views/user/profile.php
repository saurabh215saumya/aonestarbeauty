<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Edit Profile</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>"><?php echo ucfirst($controller); ?></a></li>
	    <li class="active">Edit Profile</li>
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
			<?php echo form_open_multipart($controller.'/update_profile'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <input type="hidden" name="user_id" value="<?php echo $details['id']; ?>">
			    <div class="form-group">
					<label for="username">User Name<span style="color: #ff0000">*</span></label>
					<input class="form-control" name="username" id="username" placeholder="user name" type="text" value="<?php echo $details['username']; ?>">				
			    </div>
			    <div class="form-group">
				<label for="fullname">Full Name<span style="color: #ff0000">*</span></label>
				<input class="form-control" id="fullname" name="fullname" placeholder="Full Name" type="text" value="<?php echo $details['full_name']; ?>">
				<?php echo form_error('fullname'); ?>
			    </div>
			    <div class="form-group">
				<label for="email">Email<span style="color: #ff0000">*</span></label>
				<input class="form-control" id="email" name="email" placeholder="Email" type="email" value="<?php echo $details['email']; ?>">
				<?php echo form_error('email'); ?>
			    </div>
			    <div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" id="password" name="password" placeholder="Password" type="text" value="">
				<?php echo form_error('password'); ?>
			    </div>
			    <!-- <div class="form-group">
				<label for="balance">Balance<span style="color: #ff0000">*</span></label>
				<input class="form-control" id="balance" name="balance" placeholder="Balance" type="text" value="<?php echo $details['balance']; ?>">
				<?php echo form_error('balance'); ?>
			    </div> -->			    
			    <div class="form-group">
				<label>Please Choose Status<span style="color: #ff0000">*</span></label>
				<select class="form-control" id="status" name="status">
				    <option value="">Select Status</option>
				    <option <?php echo $details['status']==1?'selected':''; ?> value="1">Active</option>
				    <option <?php echo $details['status']==0?'selected':''; ?> value="0">In Active</option>
				</select>
				<?php echo form_error('status'); ?>
			    </div>			    
			    <div class="form-group">
				<label for="profileimage">Profile Image<span style="color: #ff0000">*</span></label>
				<input id="profileimage" name="profileimage" type="file">
				<img width="60" height="45" alt="Profile image" src="<?php echo SHOW_ADMIN_PROFILE_PATH . $details['profile_image']; ?>" >
				<?php echo isset($error)?$error:""; ?>
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
