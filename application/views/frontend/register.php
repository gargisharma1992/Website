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
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
		<div class="sign-in-head black">
			<div class="sign-in-details">
				<h1>Register here</h1>			
			</div>
			<p></p>			
		</div>	
		<div class="sign-in-form" style="text-align:center">
		<p></p>	
		<p>Already have an Account?? Click here <a style="text-decoration: underline;" href="<?php echo site_url();?>/login" title="">Sign In</a></p>
			<form id="signupform" action="<?php echo SITE_URL.'register/createAccount'; ?>" method="POST">
				<i class="fa fa-user"></i><input type="text" id="username" name="username" placeholder="Username" required /></br></br></br>
				<p style="text-align:center" id="error-msg"></p>
				<i class="fa fa-password"></i><input type="password" name="password" placeholder="Password" required /></br></br></br></br>
				<i class="fa fa-email"></i><input type="email" id="email" name="email" placeholder="Email" required /></br></br></br>
				<p style="text-align:center" id="email-error-msg"></p>
				<input type="hidden" name="roleName"  required  />				
				<input type="submit" value="Sign up" id="btnSubmit" class="newclass"/>
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
<script type="text/javascript">
	$(document).ready(function() {	
		// check if username is already exists
		$("#username").keyup(function(e) {	
			var username = $('#username').val();		
			if ($('#username').val() == null || $('#username').val() == "") {
				$('#error-msg').show();
				$("#error-msg").html("Username is required field.").css("color", "red");
				$("#btnSubmit").attr("disabled", true);
			} else {				
				$.ajax({
					type: "POST",
					url: "<?php echo SITE_URL();?>register/checkUsernameExists",
					dataType: "json",
            		data: "username="+username,  
					success: function(results) {						
						if (results == true){
							$('#error-msg').show();
							$('#error-msg').html('Username already exists!!!!');
							$("#error-msg").css({"color": "red"});
							$("#btnSubmit").attr("disabled", true);
						}else{
							$('#error-msg').show();
							$('#error-msg').html('Username available!!!!');
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

		// check if email is already exists
		$("#email").keyup(function(e) {	
			var email = $('#email').val();		
			if ($('#email').val() == null || $('#email').val() == "") {
				$('#email-error-msg').show();
				$("#email-error-msg").html("Email is required field.").css("color", "red");
				$("#btnSubmit").attr("disabled", true);
			} else {				
				$.ajax({
					type: "POST",
					url: "<?php echo SITE_URL();?>register/checkEmailExists",
					dataType: "json",
            		data: "email="+email,  
					success: function(results) {						
						if (results == true){
							$('#email-error-msgg').show();
							$('#email-error-msg').html('Email already exists!!!!');
							$("#email-error-msg").css({"color": "red"});
							$("#btnSubmit").attr("disabled", true);
						}else{
							$('#email-error-msg').show();
							$('#email-error-msg').html('Email available!!!!');
							$("#email-error-msg").css({"color": "green"});
							$("#btnSubmit").attr("disabled", false);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#email-error-msg').show();
						$("#email-error-msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>