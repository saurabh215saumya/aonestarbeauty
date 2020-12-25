<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>Add Sub Menu</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
	    <li class="active"><a href="<?php echo base_url($controller); ?>">Sub Menu</a></li>
	    <li class="active">Add Sub Menu</li>
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
			<?php echo form_open_multipart($controller.'/add_newservice'); ?>
			<div class="box-body">
			    <?php echo $this->session->flashdata('response'); ?>
			    <!-- <div class="form-group">
					<label>Select Category<span style="color: #ff0000">*</span></label>
					<select class="form-control" id="category_type" name="category_type" onchange="return getCategoryPackage(this.value);" required>
					    <option value="">Select Category</option>
					    <option value="1">Male</option>
					    <option value="2">Female</option>
					</select>
					<?php echo form_error('category_type'); ?>
			    </div> -->

			    <div class="form-group">
				<label>Select Menu<span style="color: #ff0000">*</span></label>
				<select class="form-control" id="package_id" name="package_id" required>
				    <option value="">Select Menu</option>
				    <?php if(!empty($packageDataArr)){
				    	foreach($packageDataArr as $packageData){ ?>
				    		<option value="<?php echo $packageData->id; ?>"><?php echo $packageData->package_name; ?></option>
				    <?php } } ?>
				</select>
				<?php echo form_error('package_id'); ?>
			    </div> 


			    <div class="form-group">
					<label for="name">Sub Menu<span style="color: #ff0000">*</span></label>
					<input class="form-control" id="service_name" name="service_name" placeholder="Sub Menu Name" type="text" value="<?php echo set_value('service_name') ?>" required>
					<?php echo form_error('service_name'); ?>
			    </div>

			    <div class="form-group">
					<label for="name">Old Price<span style="color: #ff0000"></span></label>
					<input class="form-control" id="price" name="price" placeholder="Old Price" type="text" value="<?php echo set_value('price') ?>">
					<?php echo form_error('price'); ?>
			    </div>

			    <div class="form-group">
					<label for="name">Offer Price<span style="color: #ff0000">*</span></label>
					<input class="form-control" id="offer_price" name="offer_price" placeholder="Offer Price" type="text" value="<?php echo set_value('offer_price') ?>" required>
					<?php echo form_error('offer_price'); ?>
			    </div>


			    <div class="form-group">
					<label for="name">Page Title<span style="color: #ff0000"></span></label>
					<input class="form-control" id="page_title" name="page_title" placeholder="Page Title" type="text" value="<?php echo set_value('page_title') ?>">
					<?php echo form_error('page_title'); ?>
			    </div>

			    <div class="form-group">
					<label for="name">Slug Title<span style="color: #ff0000"></span></label>
					<input class="form-control" id="page_slug" name="page_slug" placeholder="Page Slug" type="text" value="<?php echo set_value('page_slug') ?>">
					<?php echo form_error('page_slug'); ?>
			    </div>

			    <div class="form-group">
					<label for="name">Page Slug : <span style="color: #ff0000"></span></label>
					<?php echo BASE_URL; ?> <input class="form-control" id="sub_menu_slug" name="sub_menu_slug" placeholder="Page Slug" type="text" value="<?php echo set_value('sub_menu_slug') ?>" required>
					<?php echo form_error('sub_menu_slug'); ?>
			    </div>


			    <div class="form-group">
				<label for="description">Description<span style="color: #ff0000"></span></label>
					<textarea name="description" id="editor13" value="<?php echo set_value('description') ?>"></textarea>
					<?php echo form_error('description'); ?>
				</div>

				<div class="form-group">
				<label for="description">Long Description<span style="color: #ff0000"></span></label>
					<textarea name="long_description" id="editor11" value="<?php echo set_value('long_description') ?>"></textarea>
					<?php echo form_error('long_description'); ?>
				</div>

				<div class="control-group">
				  <label class="control-label">Banner Image:</label>
					<div class="controls">
						<input type="file" class="span11" name="banner_image_file" id="banner_image_file"/>
					</div>
					<!-- <div style="color: red">*Upload Banner Image size should be 750(Height)*1920(Width).</div> -->
				</div>
			    

			    <div class="control-group">
				  <label class="control-label">Service Image_1:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file" id="uploadedImage" required />
					</div>
					<!-- <div style="color: red">*Upload Image size should be 1020(Height)*1000(Width).</div> -->
				</div>

				<div class="control-group">
				  <label class="control-label">Service Image_2:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file_2" id="uploadedImage" />
					</div>
					<!-- <div style="color: red">*Upload Image size should be 1020(Height)*1000(Width).</div> -->
				</div>

				<div class="control-group">
				  <label class="control-label">Service Image_3:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file_3" id="uploadedImage" />
					</div>
					<!-- <div style="color: red">*Upload Image size should be 1020(Height)*1000(Width).</div> -->
				</div>

				<div class="control-group">
				  <label class="control-label">Service Image_4:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file_4" id="uploadedImage"  />
					</div>
					<!-- <div style="color: red">*Upload Image size should be 1020(Height)*1000(Width).</div> -->
				</div>

				<div class="control-group">
				  <label class="control-label">Service Image_5:</label>
					<div class="controls">
						<input type="file" class="span11" name="image_file_5" id="uploadedImage"  />
					</div>
					<!-- <div style="color: red">*Upload Image size should be 1020(Height)*1000(Width).</div> -->
				</div>


				<div class="form-group">
			    	<label for="name">Meta Details:<span style="color: #ff0000"></span></label>	
			    </div>

			    <div class="form-group">
				<label for="name">Meta Title<span style="color: #ff0000"></span></label>
				<input class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" type="text" value="<?php echo set_value('meta_title') ?>">
				<?php echo form_error('meta_title'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Meta Description<span style="color: #ff0000"></span></label>
				<textarea name="meta_description" id="meta_description" placeholder="Meta Description" cols="109"><?php echo set_value('meta_description') ?></textarea>
				<?php echo form_error('meta_description'); ?>			
			    </div>

			    <div class="form-group">
				<label for="name">Meta Keywords<span style="color: #ff0000"></span></label>
				<textarea name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords" cols="109"><?php echo set_value('meta_keywords') ?></textarea>
				<?php echo form_error('meta_keywords'); ?>		
			    </div>

			    <div class="form-group">
				<label for="name">H1 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="h1_tag" id="h1_tag" placeholder="H1 Tag" type="text" value="<?php echo set_value('h1_tag') ?>">
				<?php echo form_error('h1_tag'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">H2 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="h2_tag" id="h2_tag" placeholder="H2 Tag" type="text" value="<?php echo set_value('h2_tag') ?>">
				<?php echo form_error('h2_tag'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">H3 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="h3_tag" id="h3_tag" placeholder="H3 Tag" type="text" value="<?php echo set_value('h3_tag') ?>">
				<?php echo form_error('h3_tag'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">Image Alt-1 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="image_alt_1" id="image_alt_1" placeholder="Alt1 Tag" type="text" value="<?php echo set_value('image_alt_1') ?>">
				<?php echo form_error('image_alt_1'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">Image Alt-2 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="image_alt_2" id="image_alt_2" placeholder="Alt2 Tag" type="text" value="<?php echo set_value('image_alt_2') ?>">
				<?php echo form_error('image_alt_2'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">Image Alt-3 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="image_alt_3" id="image_alt_3" placeholder="Alt3 Tag" type="text" value="<?php echo set_value('image_alt_3') ?>">
				<?php echo form_error('image_alt_3'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">Image Alt-4 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="image_alt_4" id="image_alt_4" placeholder="Alt4 Tag" type="text" value="<?php echo set_value('image_alt_4') ?>">
				<?php echo form_error('image_alt_4'); ?>				
			    </div>


			    <div class="form-group">
				<label for="name">Image Alt-5 Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="image_alt_5" id="image_alt_5" placeholder="Alt5 Tag" type="text" value="<?php echo set_value('image_alt_5') ?>">
				<?php echo form_error('image_alt_5'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Robots<span style="color: #ff0000"></span></label>
				<input class="form-control" name="robots" id="robots" placeholder="Robots" type="text" value="<?php echo set_value('robots') ?>">
				<?php echo form_error('robots'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Revisit After<span style="color: #ff0000"></span></label>
				<input class="form-control" name="revisit_after" id="revisit_after" placeholder="Revisit After" type="text" value="<?php echo set_value('revisit_after') ?>">
				<?php echo form_error('revisit_after'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Locale<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_local" id="og_local" placeholder="Og Locale" type="text" value="<?php echo set_value('og_local') ?>">
				<?php echo form_error('og_local'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Type<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_type" id="og_type" placeholder="Og Type" type="text" value="<?php echo set_value('og_type') ?>">
				<?php echo form_error('og_type'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Image<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_image" id="og_image" placeholder="Og Image" type="text" value="<?php echo set_value('og_image') ?>">
				<?php echo form_error('og_image'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Tag<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_tag" id="og_tag" placeholder="Og Tag" type="text" value="<?php echo set_value('og_tag') ?>">
				<?php echo form_error('og_tag'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Title<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_title" id="og_title" placeholder="Og Title" type="text" value="<?php echo set_value('og_title') ?>">
				<?php echo form_error('og_title'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Url<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_url" id="og_url" placeholder="Og Url" type="text" value="<?php echo set_value('og_url') ?>">
				<?php echo form_error('og_url'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Description<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_description" id="og_description" placeholder="Og Description" type="text" value="<?php echo set_value('og_description') ?>">
				<?php echo form_error('og_description'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Og Site Name<span style="color: #ff0000"></span></label>
				<input class="form-control" name="og_site_name" id="og_site_name" placeholder="Page identifire" type="text" value="<?php echo set_value('og_site_name') ?>">
				<?php echo form_error('og_site_name'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Author<span style="color: #ff0000"></span></label>
				<input class="form-control" name="author" id="author" placeholder="Author" type="text" value="<?php echo set_value('author') ?>">
				<?php echo form_error('author'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Canonical<span style="color: #ff0000"></span></label>
				<input class="form-control" name="canonical" id="canonical" placeholder="Canonical" type="text" value="<?php echo set_value('canonical') ?>">
				<?php echo form_error('canonical'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Geo Region<span style="color: #ff0000"></span></label>
				<input class="form-control" name="geo_region" id="geo_region" placeholder="Geo Region" type="text" value="<?php echo set_value('geo_region') ?>">
				<?php echo form_error('geo_region'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Geo Place Name<span style="color: #ff0000"></span></label>
				<input class="form-control" name="geo_place_name" id="geo_place_name" placeholder="Geo Place Name" type="text" value="<?php echo set_value('geo_place_name') ?>">
				<?php echo form_error('geo_place_name'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">Geo Position<span style="color: #ff0000"></span></label>
				<input class="form-control" name="geo_position" id="geo_position" placeholder="Geo Position" type="text" value="<?php echo set_value('geo_position') ?>">
				<?php echo form_error('geo_position'); ?>				
			    </div>

			    <div class="form-group">
				<label for="name">ICBM<span style="color: #ff0000"></span></label>
				<input class="form-control" name="icbm" id="icbm" placeholder="ICBM" type="text" value="<?php echo set_value('icbm') ?>">
				<?php echo form_error('icbm'); ?>				
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

<script type="text/javascript">
	function getCategoryPackage(id){ //alert(id); return false;
		var saveData = $.ajax({
	        type: "POST",
	        url: "<?php echo base_url('package/getAllCategoryPackage'); ?>",
	        data:"category_type="+id,
	        dataType: "text",
	        success: function(resultData){ //alert(resultData); return false;
	            document.getElementById("package_id").innerHTML = resultData;
	        }       
	    });
	}
</script>

<script>
CKEDITOR.replace('editor11', {
  height: 250,
  extraPlugins: 'section,colorbutton,colordialog,forms,font,div,stylescombo',
  
});

CKEDITOR.replace('editor12', {
  height: 250,
  extraPlugins: 'section,colorbutton,colordialog,forms,font,div,stylescombo',
  
});

CKEDITOR.replace('editor13', {
  height: 250,
  extraPlugins: 'section,colorbutton,colordialog,forms,font,div,stylescombo',
  
});
</script>