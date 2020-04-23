<?php//echo validation_errors();?>   
<?php echo form_open('reservation_controller/testConnexion');?>

<!DOCTYPE html>
<head>
	<title>Page de connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form">
					<span class="login-form-title p-b-55">
						Page de connexion
					</span>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="mail" placeholder="Email">
						<span class="focus-input100"></span>
            <span class="symbol-input100"></span>
            </div>
				
				

					<div class="wrap-input validate-input m-b-16">
						<input class="input100" type="password" name="mdpClient" placeholder="Mot de passe">
						<span class="focus-input100"></span>
            <span class="symbol-input100"></span>
            </div>  
							
					
					
					<div class="container-login-form-btn p-t-25">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Pas encore membre ?
						</span>

						<a class="txt1 bo1 hov1" href="#">
							Inscrivez-vous					
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
