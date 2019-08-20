<?php echo $this->load->view('frontend/includes/header'); ?>
	<div class="wrapper">
		<div class="container">
			<div class="col-md-6">
				<div class="heading-sec">
					
				</div>
			</div>
			<div class="col-md-6">
				<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                  <i class="fa fa-calendar-o icon-calendar icon-large"></i>
                  <span></span> <b class="caret"></b>
               </div>
			</div>
			
			<form enctype="multipart/form-data" method="post" action="<?php echo SITE_URL.'documents/upload_file'; ?>" >
				<input type='hidden' name="uploadedBy" value="<?php echo $this->session->userdata('userId');?>" > 
				<div class="form-group">
					<label for="text">Document name</label>
					<input type="text"  id="documentName" class="form-control"  name="documentName" required>
					<p  id="error-msg"></p>
				</div>
				<div class="form-group">
					<label for="document">Upload Document:</label>
					<input type="file" class="form-control"  name="documentFile" required>
				</div>  
				
					<input type='submit' id="btnSubmit" value='Upload' name='upload' />
			</form>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {	
		$("#documentName").keyup(function(e) {	
			var documentName = $('#documentName').val();			
			if ($('#documentName').val() == null || $('#documentName').val() == "") {
				$('#error-msg').show();
				$("#error-msg").html("Document name is required field.").css("color", "red");
				$("#btnSubmit").attr("disabled", true);
			} else {	
						
				$.ajax({
					type: "POST",
					url: "<?php echo SITE_URL();?>documents/checkDocNameExists",
					dataType: "json",
            		data: "documentName="+documentName,  
					success: function(results) {			;					
						if (results == true){
							$('#error-msg').show();
							$('#error-msg').html('Document name already exists!!!!');
							$("#error-msg").css({"color": "red"});
							$("#btnSubmit").attr("disabled", true);
						}else{
							$('#error-msg').show();
							$('#error-msg').html('Document name  available!!!!');
							$("#error-msg").css({"color": "green"});
							$("#btnSubmit").attr("disabled", false);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#error-msg').show();
						$("#error-msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>