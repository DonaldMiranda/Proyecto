<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRYPTOGRAFIA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{action('UsuarioController@create')}}">
			    	{!! csrf_field() !!}
					<span class="login100-form-title">
						Crear una Cuenta
                    </span>
                    
					<div class="wrap-input100 validate-input"  data-validate = "Este Campo es Obligatorio">
						<input class="input100" type="text" name="nombre" placeholder="Nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input"  data-validate = "Este Campo es Obligatorio">
						<input class="input100" type="text" name="apellido" placeholder="Nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Este Campo es Obligatorio">
						<input class="input100" type="email" name="email" placeholder="Correo Electronico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input"  data-validate = "Este Campo es Obligatorio">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Este Campo es Obligatorio">
						<input class="input100" type="password" name="pass_confirm" placeholder="Confirmacion de Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registrarme
						</button>
					</div>

					<div class="text-center p-t-12">	
						<a class="txt2" href="{{action('UsuarioController@Login')}}">
							Iniciar Sesion
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	@if(isset($_SESSION['status']))
	  <script>
			Swal.fire({
			  icon: "{{$_SESSION['status']['estado']}}",
			  title: "{{$_SESSION['status']['titulo']}}",
			  text:  "{{$_SESSION['status']['mensaje']}}"
			});
			{{session_destroy()}}

	  </script>
	@endif
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
	     $("#submit").attr('disabled',true)
		$('.js-tilt').tilt({
			scale: 1.1
		})

		$("input[name='pass_confirm").keyup(function(){
			var pass = $("input[name='pass']").val();
			if(pass == $(this).val()){
				console.log($(this).val());
			}else{
				
			}
			
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>