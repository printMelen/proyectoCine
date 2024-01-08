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

<body class="container text-white bg-back max-w-screen-2xl mx-auto font-Poppins">
     <?php include("app/view/templates/header.php"); ?>
     <main class="grid grid-rows-[106px_787px] py-[30px] px-[68px]">
          <div class="h-[106px]">
               <h1 class="text-white mb-[15px]">Cartelera</h1>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF4C] rounded-[6.29px]">En cartelera</button>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF1A] rounded-[6.29px] ml-[27px]">Próximamente</button>
          </div>
          <div class="bg-backGuardianes w-[100%] h-[100%]">

          </div>
     </main>
     <?php include("app/view/templates/footer.php"); ?>
     <script src="../js/custom.js"></script>
</body>
</html>