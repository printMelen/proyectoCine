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
          <div class="h-[106px]">
               <h1 class="text-white mb-[15px]">Cartelera</h1>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF4C] rounded-[6.29px]">En cartelera</button>
               <button class="w-[142px] h-[46px] bg-[#FFFFFF1A] rounded-[6.29px] ml-[27px]">Próximamente</button>
          </div>
          <div class="mx-auto bg-backGuardianes w-[1500px] h-[787px]">
          </div>
          <div class="flex flex-wrap gap-[55px] h-[466px] justify-center">
               <?php
               for ($i=0; $i < 2; $i++) { 
                    include("app/view/templates/cardGrande.php");
               }
               ?>
          </div>
          <div class="flex flex-wrap gap-[58px] mt-[61px] h-[396px] justify-center">
               <?php
               for ($i=0; $i < count($_SESSION['imgPelis'])-2; $i++) { 
                    include("app/view/templates/cardPeque.php");
               }
               ?>
          </div>
          <div class="mx-auto bg-backLambo bg-no-repeat w-[1431px] h-[725px] mt-[20px]">

          </div>
          <div class="flex justify-center h-[87px] mt-[85px] mb-[55px]">
               <button class="flex justify-center items-center w-[1360px] h-[87px] bg-[#6D6D6D33] border border-[#8F8F8F66] rounded-[7px]">Show more</button>
          </div>
          
     </main>
     <?php include("app/view/templates/footer.php"); ?>
     <script src="../js/custom.js"></script>
</body>

</html>