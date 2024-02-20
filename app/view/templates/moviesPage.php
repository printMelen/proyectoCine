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
          <div class="h-[250px]">
               <h1 class="text-white mb-[15px]">Buscar peliculas</h1>
               <p class="mb-[50px]">PlayON online cinema offers more than three thousand films for viewing, including new releases and premieres</p>
               <form class="max-w-md mx-auto mb-5">   
               <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only text-white">Search</label>
               <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                         <img src="app\view\images\lupa.svg" alt="" srcset="">
                    </div>
                    <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar peliculas, series,..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-pink hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
               </div>
               </form>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF4C] rounded-[6.29px]">Genres</button>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF1A] rounded-[6.29px] ml-[27px]">Released</button>
          </div>
          <div class="container max-w-screen-1400 flex flex-wrap gap-[40px] mx-auto justify-center my-[30px]">
               <?php
               for ($i = 0; $i < count($_SESSION['datosPelis']); $i++) {
                    echo <<<EOT
                         <a href="index.php?peticion=moviePreview&id=$i">
                              <img class="w-[200px] h-[300px] rounded-xl shadow-xl" src="app/view/images/caratula/{$_SESSION['datosPelis'][$i]['cartel']}" alt="" srcset="">
                         </a>
                    EOT;
               }
               ?>
          </div>
     </main>
     <?php include("app/view/templates/footer.php"); ?>
     <script src="../js/custom.js"></script>
</body>

</html>