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
                
                    
                    <form enctype="multipart/form-data" method="post" action="<?php echo SITE_URL.'documents/editDocument'; ?>" >
                        
                        <div class="form-group">
                        <label for="exampleInputEmail1">Document Name</label>
                        <input type="text" name="documentName" class="form-control" value="<?php echo $getDocumentById->documentName;?>" placeholder="Enter User name" required>

                        <label for="exampleInputEmail1">Upload Document</label>
                        <a><?php echo $this->encrypt->decode($getDocumentById->document);?></a>
                        <input type="file" name="documentFile" class="form-control"  >

                       <input type="hidden" value="<?php echo $getDocumentById->id;?>" name="id">

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