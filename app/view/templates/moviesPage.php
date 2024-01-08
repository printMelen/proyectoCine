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
     <main class="flex flex-col py-[30px] px-[68px] h-[100%] bg-[#0A031C]">
          <div class="h-[176px]">
               <h1 class="text-white mb-[15px]">Buscar peliculas</h1>
               <p class="mb-[50px]">PlayON online cinema offers more than three thousand films for viewing, including new releases and premieres</p>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF4C] rounded-[6.29px]">Genres</button>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF1A] rounded-[6.29px] ml-[27px]">Released</button>
          </div>
          <div class="mt-[30px]">
               <h2 class="text-white mb-[15px]">Api de Jorge</h2>
               <?php include("app/view/templates/carruselMovies.php"); ?>
          </div>
          <div class="mt-[30px]">
               <h2 class="text-white mb-[15px]">Comedia</h2>
               <?php include("app/view/templates/carruselMovies.php"); ?>
          </div>
          <div class="mt-[30px]">
               <h2 class="text-white mb-[15px]">Familia</h2>
               <?php include("app/view/templates/carruselMovies.php"); ?>
          </div>
          <div class="mt-[30px]">
               <h2 class="text-white mb-[15px]">Drama</h2>
               <?php include("app/view/templates/carruselMovies.php"); ?>
          </div>
     </main>
     <?php include("app/view/templates/footer.php"); ?>
     <script src="../js/custom.js"></script>
</body>

</html>