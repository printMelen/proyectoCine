
<!DOCTYPE html>
<!--[if lt IE 7]>   <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]> 		<html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]> 		<html class="ie8 no-js" lang="es"> <![endif]-->
<!--[if IE 9]> 		<html class="ie9 no-js" lang="es"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

<head>
     <meta charset="utf-8">
     <meta name="author" content="Álvaro Redondo Rodríguez">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <title>PlayOn</title>
     <link href="app/view/css/dist/output.css" rel="stylesheet">

</head>

<body class="flex flex-row-reverse container bg-whiteAdmin max-w-screen-2xl justify-between mx-auto font-Poppins">
     <div class="container max-w-screen-xs flex flex-col h-[100%]">
          <?php include("headerAdmin.php"); ?>
          <?php 
               $_GET['peticion']=$_GET['peticion']??null;
               if ($_GET['peticion']=="login") {
                    ViewController::cargarVista("landingAdmin");
               // }elseif(isset($_GET['peticion'])){
                    // include $_GET['peticion'].'.php';
               }else{
                    ViewController::cargarVista($_GET['peticion']);
                    // ViewController::cargarVista("indexAdmin");
               }
          ?>
     </div>
     
     <?php include("asideAdmin.php"); ?>     
     
     <script src="assets/js/custom.js"></script>
</body>
</html>