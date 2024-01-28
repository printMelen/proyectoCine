
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

<body class="container max-w-screen-2xl mx-auto bg-[#020510] text-white">
     <?php include("header.php"); ?>
     <main class="mt-5">
          <div class="flex items-center">
            <div class="basis-1/3 h-[602px]">
               <h1 class="text-3xl text-center mb-5">
                    <?php
                         echo $_SESSION['datosPelis'][$_GET['id']]['nombre'];
                    ?>
               </h1>
               <div class="flex flex-wrap justify-around mb-5">
                    <span class="bg-grey rounded w-[30px] text-center">
                         <?php
                              echo random_int(1,9).".".random_int(0,9);
                         ?>
                    </span>
                    <span>
                         <?php
                              echo random_int(1950, date("Y"));
                         ?>
                    </span>
                    <span>
                         <?php echo $_SESSION['datosPelis'][$_GET['id']]['nombre_genero']?>
                    </span>
                    <span>
                         <?php
                              echo random_int(1,6).":".random_int(0,6)."0";
                         ?>
                    </span>
                    <span>
                         <?php
                              echo $_SESSION['datosPelis'][$_GET['id']]['clasificacion_edad'];
                         ?>
                    </span>
               </div>
               <p>
                    <?php
                         echo substr($_SESSION['datosPelis'][$_GET['id']]['argumento'],0,160)."...";
                    ?>
               </p>
               <div class="flex flex-col justify-around mt-5">
                    <div>
                         <span class="text-[#9E9E9E]">
                              Director:
                         </span>
                         <span class="">
                              <?php
                              if ($_SESSION['datosPelis'][$_GET['id']]['nombre_director']!=NULL) {
                                   echo $_SESSION['datosPelis'][$_GET['id']]['nombre_director'];
                              }
                              ?>
                         </span>
                    </div>
                    <div>
                         <span class="text-[#9E9E9E]">
                              Actor/Actriz: 
                         </span>
                         <span class="">
                              <?php
                              if ($_SESSION['datosPelis'][$_GET['id']]['nombre_actor']!=NULL) {
                                   echo $_SESSION['datosPelis'][$_GET['id']]['nombre_actor'];
                              }
                              ?>
                         </span>
                    </div>
               </div>
            </div>   
            <div class="bg-pink basis-2/3 h-[673px]">
               <img class="h-[100%] w-[100%]" src="app/view/images/caratula/<?php echo $_SESSION['datosPelis'][$_GET['id']]['cartel']; ?>" alt="" srcset="">
            </div>   
          </div>
     </main>
     <?php include("footer.php"); ?>     
     <script src="assets/js/custom.js"></script>
</body>
</html>