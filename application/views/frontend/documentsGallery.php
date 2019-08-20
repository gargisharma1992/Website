<?php echo $this->load->view('frontend/includes/header'); ?>

	<div class="wrapper">
		<div class="container">
			<div class="col-md-6">
				<div class="heading-sec">
					<h1>Documents Gallery</h1>
				</div>
			</div>
			<div class="col-md-6">
				<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                  <i class="fa fa-calendar-o icon-calendar icon-large"></i>
                  <span></span> <b class="caret"></b>
               </div>
			</div>
			
			

			<?php if(!empty($documentList)){ foreach($documentList as $data){ ?>
				<!-- Trigger the modal with a button -->
				
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">                     
						<embed src="<?php echo base_url().'assets/uploads/documents/'.$this->encrypt->decode($data->document); ?>" frameborder="0" width="100%" height="300px">
                         <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			<div class="col-md-3">
				<div class="widget-body gallery">                                 
                        <embed src="<?php echo base_url().'assets/uploads/documents/'.$this->encrypt->decode($data->document); ?>" frameborder="0" width="100%" height="300px">
               
					<div >
						<h4><?php echo $data->documentName;?></h4>						
					</div>

				
				</div>
				<a target="_blank" href="<?php echo base_url().'assets/uploads/documents/'.$this->encrypt->decode($data->document); ?>" class="dwn"><button class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-download"></span> Download</button></a>
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
			</div>
			
			<?php } } ?>
		
</div> 
			<script language="javascript" type="text/javascript">
  $(document).ready(function() {
	 // alert("sd");
    $('#trigger').click(function(){
      $("#dialog").dialog();
    }); 
  });                  
</script>
			
			
			
			
			
		</div><!-- Container -->
	</div><!-- Wrapper -->
	


</body>
</html>