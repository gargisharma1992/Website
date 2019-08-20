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
	
	<div class="row">
		<div class="box col-md-12">
			<div class="box-inner">			
				<div class="box-content">
                
                    <form role="form" method = "post" action="<?php echo SITE_URL.'aclController/addUsers'; ?>" >
                        <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Enter User name" required>

                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" name="password" class="form-control"  placeholder="Enter Password" required>

                        <label for="exampleInputEmail1">Role</label>
                        <select class="form-control" name="roleName" required>
                        <?php 

                        foreach($roles as $row)
                        { 
                        echo '<option value="'.$row->roleId.'">'.$row->roleName.'</option>';
                        }
                        ?>
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