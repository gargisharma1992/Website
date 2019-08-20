<?php echo $this->load->view('frontend/includes/header'); ?>
<div class="wrapper">
    <div class="container">
        <div class="col-md-6">
            <div class="heading-sec">
                <h1><?php echo "Add User Data" ?><i></i></h1>
    
            </div>
        </div>
        <div id="content" class="col-lg-10 col-sm-10">
<!-- content starts -->			
    <?php $roleIdInUser =  $getSavedUser->roleId;  ?>
  
	<div class="row">
		<div class="box col-md-12">
			<div class="box-inner">			
				<div class="box-content">
                
                    <form role="form" method = "post" action="<?php echo SITE_URL.'aclController/editUser'; ?>" >
                        <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $getSavedUser->username;?>" required>

                        <label for="exampleInputEmail1">Role</label>                       
                        <select class="form-control" name="roleName" required>
                        <?php foreach($getroles as $a) {   ?>
                            <option value="<?php echo $a->roleId; ?>" <?php if ($a->roleId == $roleIdInUser) { echo 'selected'; } ?> ><?php echo $a->roleName;?></option>;
                         <?php  }  ?>
                        </select>
                        <input type="hidden" name="id" value="<?php echo $getSavedUser->id;?>" >
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