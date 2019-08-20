<?php echo $this->load->view('frontend/includes/header'); ?>


	<div class="wrapper">
		<div class="container">
			
			<div class="col-md-10">
				<div class="heading-sec">
					<h1 ><?php echo "Dashboard" ?></h1></br>               
					<button id="editProfile" style="float: right;">Edit Profile </button>
				</div>
        	</div>
			<div class="box col-md-12">
    <div id="mydivs">   
    <?php if($this->session->flashdata('msg')): ?>
    <p style="color:green; text-align:center"><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
    </div>
			<div class="col-md-10">
				<h3 style="text-align:center">Welcome <?php echo $this->session->userdata('userName');?><h3>


			</div>
			<div class="col-md-10" id="profileId" >
			
		
			<form role="form" method = "post" action="<?php echo SITE_URL.'dashboard/editProfile'; ?>" >
                        <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $getUserData->username;?> "  placeholder="Enter User name" required>

                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control"  value="<?php echo $getUserData->password;?> " placeholder="Enter Password" required>
                       </div>

                        <input type="submit" name = "submit "class="btn btn-default">
                    </form>

					
			</div>
		</div><!-- Container -->
	</div><!-- Wrapper -->
	
<!-- RAIn ANIMATED ICON-->


</body>
</html>
<script>

$(document).ready(function(){
	setTimeout(function() {
            $('#mydivs').hide('fast');
        }, 1000);
 $("#profileId").hide();
 $("#editProfile").click(function(){
	$("#profileId").show();
 });

})
     
    </script>
</script>
