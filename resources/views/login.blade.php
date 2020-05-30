<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRYPTOGRAFIA</title>
    <meta charset="UTF-8">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
  <script type="text/javascript" src="js/instascan.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--===============================================================================================-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <span class="login100-form-title">ACCESO POR CODIGO QR</span>
				<div class="embed-responsive embed-responsive-21by9">        
            <video id="preview" width="250"></video>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        $.ajax({     
                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},          
                     url:'{{route("verify.user")}}', 
                     method:'post',   
                     data: {data:content},  
                     dataType:'json',          
                     success: function(datos) {   
                       if(datos.session==true){
                          window.location.href = "http://localhost/desktop";
                       }else{
                        Swal.fire({
                              icon: 'error',
                              title: ':::: ATENCION :::',
                              text: 'No ha podido iniciar sesion,el codigo no es valido'
                            });
                       }         
            },
            error: function(){
              Swal.fire({
                              icon: 'error',
                              title: ':::: ATENCION :::',
                              text: 'No ha podido iniciar sesion,el codigo no es valido'
                            });

            }
        })  
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>

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
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>