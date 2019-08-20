<?php echo $this->load->view('frontend/includes/header'); ?>
<div class="wrapper">
    <div class="container">
        <div class="col-md-6">
            <div class="heading-sec">
                <h1><?php echo "Add permission" ?><i></i></h1>
            </div>
        </div>
        <div class="col-md-6">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class=""></i>
                <span></span>
                <b class="caret"></b>
            </div>
        </div>

        <div id="content" class="col-lg-10 col-sm-10">
<!-- content starts -->			
	
	<div class="row">
		<div class="box col-md-12">
			<div class="box-inner">			
				<div class="box-content">
				<form role="form" method = "post" action="<?php echo SITE_URL.'aclController/addRoles'; ?>" >
				<div class="form-group">
				<label for="exampleInputEmail1">Role Name</label>
				<input type="text" name="roleName" class="form-control"  placeholder="Enter Role name">

                <label for="exampleInputEmail1">Permission</label>
			
                <select name="foods[]" class="selectpicker" multiple title="Choose Foods" multiple data-max-options="2" data-live-search="true">
  <option value="1">Mustard</option>
  <option value="2">Ketchup</option>
  <option value="3">Relish</option>
</select>
                </div>

				<input type="submit" name = "submit "class="btn btn-default">
				</form>

				</div>
			</div>
		</div>
	<!--/span-->
</div>
        
    </div>
    <!-- Container -->
</div>
<!-- Wrapper -->

</body>
</html>