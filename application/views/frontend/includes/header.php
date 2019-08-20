<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dilitrust</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>


<!-- Styles -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>css/bootstrap.min.css" type="text/css" /><!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome-4.0.3/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>css/nv.d3.css" type="text/css" /><!-- VISITOR CHART -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo CSS_PATH; ?>css/daterangepicker-bs3.css" /><!-- Date Range Picker -->
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>css/style.css" type="text/css" /><!-- Style -->	
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>css/responsive.css" type="text/css" /><!-- Responsive -->	


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- Script -->
<script src="<?php echo CSS_PATH; ?>js/jquery-1.10.2.js"></script><!-- Jquery -->
<script type="text/javascript"  src="<?php echo CSS_PATH; ?>js/d3.v2.js"></script><!-- VISITOR CHART -->
<script type="text/javascript"  src="<?php echo CSS_PATH; ?>js/nv.d3.js"></script><!-- VISITOR CHART -->
<script type="text/javascript"  src="<?php echo CSS_PATH; ?>js/live-updating-chart.js"></script><!-- VISITOR CHART -->
<script type="text/javascript"  src="<?php echo CSS_PATH; ?>js/bootstrap.min.js"></script><!-- Bootstrap -->
<script type="text/javascript"  src="<?php echo CSS_PATH; ?>js/script.js"></script><!-- Script -->
<script src="<?php echo CSS_PATH; ?>js/jquery.easypiechart.min.js"></script> <!-- Easy Pie Chart -->
<script src="<?php echo CSS_PATH; ?>js/easy-pie-chart.js"></script> <!-- Easy Pie Chart -->
<script src="<?php echo CSS_PATH; ?>js/skycons.js"></script> <!-- Skycons -->
<script src="<?php echo CSS_PATH; ?>js/enscroll-0.5.2.min.js"></script> <!-- Custom Scroll bar -->
<script src="<?php echo CSS_PATH; ?>js/moment.js"></script> <!-- Date Range Picker -->
<script src="<?php echo CSS_PATH; ?>js/daterangepicker.js"></script><!-- Date Range Picker -->
<script src="<?php echo CSS_PATH; ?>js/ticker.js"></script><!-- Ticker -->
<script src="<?php echo CSS_PATH; ?>js/html5lightbox.js"></script><!-- Ticker -->

</head>
<body>
	<header>
	<div class="responsive-menu">
			<div class="responsive-menu-dropdown blue">
				<a title="" class="blue">MENU <i class="fa fa-align-justify" ></i></a>
			</div>
		<ul>
			<li><a href="<?php echo site_url('dashboard'); ?>" title="" ><i class="fa fa-desktop"></i>DASHBOARD</a></li>
			<li><a href="<?php echo site_url('documents'); ?>" title="" ><i class="fa fa-heart-o"></i>DOCUMENT</a></li>	
			<li><a href="<?php echo site_url('clients'); ?>" title="" ><i class="fa fa-unlink"></i>CLIENT'S</a></li>	
			<li><a href="<?php echo site_url('drivers'); ?>" title="" ><i class="fa fa-rocket"></i>DRIVERS</a></li>			
			<li><a href="<?php echo site_url('tools'); ?>" title="" ><i class="fa fa-tint"></i>TOOLS</a></li>
			<li><a href="#" title="" ><i class="fa fa-thumbs-o-up"></i><span><i>3</i></span>ACL</a>
				<ul>

					<li><a href="<?php echo SITE_URL.'acl/users'; ?>" title="">Users</a></li>
					<li><a href="<?php echo SITE_URL.'acl/roles'; ?>" title="">Roles</a></li>
					<li><a href="<?php echo SITE_URL.'acl/permissions'; ?>" title="">Permissions</a></li>
				</ul>		
			</li>
		</ul>

	</div>
	
		<div class="logo">
			<img src="<?php echo CSS_PATH; ?>images/dilitrust.png" style="width:42px" alt="" />
		</div>

		<div class="header-alert">
			<ul>
				<li><a title=""><i class="fa fa-user"></i><?php echo $this->session->userdata('userName');?></a></li>							
			</ul>
		</div>

		<div class="right-bar-sec">			
			<a href="<?php echo site_url('dashboard/logout'); ?>" class="right-bar-btn"><i class="fa fa-power-off"></i></a>
		</div><!-- Right Bar -->
		</div>
		</header><!-- Header -->

	<div class="menu">
		<div class="menu-profile" id="intro3">
			
			<p style="text-transform: capitalize;color:white">Login as:</br><?php echo $this->session->userdata('userName');?></p>
			
			<div class="menu-profile-hover">
			<h1> <?php echo $this->session->userdata('userName');?></h1>
			
				<a href="<?php echo site_url('dashboard/logout'); ?>" title=""><i class="fa fa-power-off"></i></a>
			
			</div>
		</div>
		<ul>
<?php if( $this->session->userdata('roleName') == 'admin'){?>

			<li><a href="<?php echo site_url('dashboard'); ?>" title="" ><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
		
			<li><a href="<?php echo site_url('documents/showDocumentList'); ?>" title="" ><i class="fa fa-file"></i>DOCUMENTS</a></li>
			<li><a href="<?php echo site_url('documents/showDocumentsInGallery'); ?>" title="" ><i class="fa fa-file"></i>GALLERY</a></li>		
			
			<li><a href="#" title="" ><i class="fa fa-thumbs-o-up"></i><span><i>3</i></span>ACL</a>
				<ul>
					<li><a href="<?php echo SITE_URL.'aclController/showUsersList'; ?>" title="">Users</a></li>
					<li><a href="<?php echo SITE_URL.'aclController/showRolesList'; ?>" title="">Roles</a></li>
					<li><a href="<?php echo SITE_URL.'aclController/showPermissionList'; ?>" title="">Permissions</a></li>
				</ul>		
			</li>
			<li><a href="<?php echo site_url('dashboard/logout'); ?>" title="" ><i class="fa fa-power-off"></i>LOG OUT</a></li>	
	
			<?php	} else { ?>
			
		<li><a href="<?php echo site_url('dashboard'); ?>" title="" ><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
		
		<li><a href="<?php echo site_url('documents/showDocumentList'); ?>" title="" ><i class="fa fa-file"></i>DOCUMENTS</a></li>
		
		<li><a href="<?php echo site_url('dashboard/logout'); ?>" title="" ><i class="fa fa-power-off"></i>LOG OUT</a></li>	

			<?php } ?>	
			
			
		</ul>
	</div><!-- Right Menu -->

	