<?php 
ob_start();
define('namaAPP', 'Aplikasi e-Hotel');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?=constant("namaAPP")?></title>
	
	

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="../icon/agenda.png" height="20">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<style>
	.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
	}
	.login-form-1{
		padding: 5%;
		box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
	}
	.login-form-1 h3{
		text-align: center;
		color: #333;
	}
	.login-form-2{
		padding: 5%;
		background: #0062cc;
		box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
	}
	.login-form-2 h3, h4{
		text-align: center;
		color: #fff;
	}
	.login-container form{
		padding: 10%;
	}
	.btnSubmit
	{
		width: 50%;
		border-radius: 1rem;
		padding: 1.5%;
		border: none;
		cursor: pointer;
	}
	.login-form-1 .btnSubmit{
		font-weight: 600;
		color: #fff;
		background-color: #0062cc;
	}
	.login-form-2 .btnSubmit{
		font-weight: 600;
		color: #0062cc;
		background-color: #fff;
	}
	.login-form-2 .ForgetPwd{
		color: #fff;
		font-weight: 600;
		text-decoration: none;
	}
	.login-form-1 .ForgetPwd{
		color: #0062cc;
		font-weight: 600;
		text-decoration: none;
	}

	</style>
</head>
<body>
		<div class="container login-container">
            <div class="row center">
                <div class="col-md-6 login-form-2">
                    <h4>LOGIN</h4>
                    <h3><?=constant("namaAPP")?></h3>
                    <form class="validate-form" method="post" action="../C_login/">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div>
                    </form>
                </div>
				<div class="col-md-6" style="background: url('images/hotel-booking.png'); background-size: auto;"></div>
            </div>
        </div>

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</body>
</html>