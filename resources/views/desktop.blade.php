<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	     <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	     <script src="https://code.jquery.com/jquery-3.5.0.slim.js" integrity="sha256-sCexhaKpAfuqulKjtSY7V9H7QT0TCN90H+Y5NlmqOUE=" crossorigin="anonymous"></script>
<!DOCTYPE html>
	<head>
	     <title>CRYPTOGRAFIA</title>
	     <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/HossamAli/pen/KvmeJO?limit=all&page=30&q=terminal" />
	     <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
		 <link rel='stylesheet' href='css/desktop.css'>
	
	</head>

<body>
<body>
<div class="nav">
  <div class="left">
      <span></span> Hola ! {{$_SESSION['user']['user']}}
  </div>
  <div class="right">
    <span class="time"></span>
    <span class="am-pm"></span>
    <a href="{{action('UsuarioController@destroy')}}" style="color:white;"><i class="fa fa-power-off fa-fw"></i></a>
  </div>
</div>

<div class="luncher">

  <span data-toggle="tooltip" title="Historial de Sesion">
    <i class="fa fa-folder item"></i>
  </span>

  <span data-toggle="tooltip" title="Informacion usuario">
    <i class="fa fa-user item"></i>
  </span>

</div>

	<div class="desktop"></div>
	
</body>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="js/desktop.js" ></script>
</html>