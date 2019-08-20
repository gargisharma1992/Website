<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Log in</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>

<!-- Styles -->
<link rel="stylesheet" href="font-awesome-4.0.3/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>css/style.css" type="text/css" /><!-- Style -->
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>css/responsive.css" type="text/css" /><!-- Responsive -->	

<style>
.newclass{
color: #FFFFFF !important;
font-family: open sans !important;
letter-spacing: 0.25px !important;
text-decoration: none !important;
border-radius: 3px !important;
color: #FFFFFF !important;
display: table !important;
float: none !important;
font-family: open sans !important;
font-size: 20px !important;
font-weight: 600 !important;
line-height: 13px !important;
margin: 0 auto !important;
padding: 17px 85px !important;
background-image: url("<?php echo CSS_PATH; ?>/images/black.jpg") !important;
background-size: 100% 100% !important;
border: 1px solid #414a58 !important;
-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.50) inset !important;
-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.50) inset !important;
-ms-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.50) inset !important;
-o-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.50) inset !important;
box-shadow: 0 1px 0 rgba(255, 255, 255, 0.50) inset !important;
}
</style>
</head>
<body class="sign-in-bg">	
	<div class="sign-in">
		
	<div id="mydivs">   
    <?php if($this->session->flashdata('success-message')): ?>
    <p style="color:green"><?php echo $this->session->flashdata('success-message'); ?></p>
	<?php endif; ?>
	</div>
	
	<div id="mydivs">   
    <?php if($this->session->flashdata('msg')): ?>
    <p style="color:red"><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
    </div>
		<div class="sign-in-head black">
	
			<div class="sign-in-details">
				<h1>Sign In<i class="fa fa-lock"></i></h1>			
			</div>
			<div class="log-in-thumb">
				<img src="<?php echo CSS_PATH; ?>images/sign-in.jpg" alt="" />				
			</div>			
		</div>
		<div class="sign-in-form">
		<div style="text-align:center">
		<p>Don't have an account???  <a href="<?php echo site_url();?>register/" title="">Click here</a></p>
		</div>
			<form action="<?php echo SITE_URL.'login/checklogin'; ?>" method="POST">
				<i class="fa fa-user"></i><input type="text" name="user" placeholder="USER NAME" /></br></br></br></br>

				<i class="fa fa-lock"></i><input type="password" name="password" placeholder="PASSWORD" /></br></br></br></br>
				
				<input type="submit" value="LOG IN" class="newclass"/>
			</form>
			
		</div>
		<ul>
			<li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
			<li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
			<li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
		</ul>
	</div>
</body>
</html>
<script>


     
    </script>

