<?php echo $this->load->view('frontend/includes/header'); ?>
<div class="wrapper">
    <div class="container">       
        <div class="col-md-10">
            <div class="heading-sec">
                <h1><?php echo "Documents" ?></h1></br>               
                <button style="float: right;"><a  href="<?php echo SITE_URL.'documents' ?>"> Add new Document </a></button>
            </div>
        </div>

        <div id="content" class="col-lg-10 col-sm-10">      
            <!-- content starts -->
			<div class="row">
                <div class="box col-md-12">
                <div id="mydivs" >   
                    <?php if($this->session->flashdata('msg')): ?>
                        <p style="color:green;text-align:center"><?php echo $this->session->flashdata('msg'); ?></p>
                    <?php endif; ?>
                </div>
  
            <div class="box-inner">   
                <div class="box-content">   
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="tblData">
                        <thead>   
                            <tr>
                                <th>Document Name</th>
                                <th>Document</th>
                                <th>Date</th>
                                <th>Uploaded By</th>
                                <th>User Role</th>
                                <th>Actions</th>      
                            </tr>
                        </thead>
                        <tbody>   
                            <?php if( !empty($documentList )) { 	?>
                            <?php foreach ($documentList as $data) { ?>      
                            <tr>
                                <td><?php echo $data->documentName;?> </td>		
                                <td class="center"><?php echo $this->encrypt->decode($data->document);?></td>
                                <td ><?php echo $data->date;?></td>
                                <td class="center"><?php echo $data->username;?></td>
                                <td class="center"><?php echo $data->aliasRole;?></td>		 
                                <td class="center">       
                                    <a  href="<?php echo SITE_URL.'documents/showEditDocumentForm/'.$data->docId;?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                    <a  href="<?php echo SITE_URL.'documents/deleteDocument/'.$data->docId; ?>"><button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></a>
                                    <a target="_blank" href="<?php echo base_url().'assets/uploads/documents/'.$this->encrypt->decode($data->document); ?>" class="dwn"><button class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-download"></span></button></a>
                                </td>
                            </tr>
                            <?php }} else { ?>
                            <p style="text-align:center;color:red"><?php echo "No Records in the database." ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!--/span-->
    </div><!--/row-->    
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        setTimeout(function() {
                $('#mydivs').hide('fast');
            }, 1000);
    })     
</script>

