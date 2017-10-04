<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<style>body{padding-top: 60px;}</style>
	
    <link href="<?php echo base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" />
 
	<link href="<?php echo base_url()?>assets/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	
	<script src="<?php echo base_url()?>assets/jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/login-register.js" type="text/javascript"></script>

</head>
<body>
    <div class="container"> 
      <div class="panel">
         <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="panel-title">Login with</h4>
        </div>
        <div class="panel-body">  
            
            <div class="box col-md-4">
                <div class="content registerBox" style="display:none;">
                 <div class="form">
                    <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                    <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                    <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="forgot login-footer">
                <span>Looking to 
                     <a href="javascript: showRegisterForm();">create an account</a>
                ?</span>
            </div>
            <div class="forgot register-footer" style="display:none">
                 <span>Already have an account?</span>
                 <a href="javascript: showLoginForm();">Login</a>
            </div>
        </div>        
      </div>
    </div>
</body>
</html>
