
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
     <main class="flex flex-col mt-5 gap-5">
        <div class="flex bg-[#1D1731] w-[100%] rounded-[15.833px] h-[259px] justify-center">
            <div class="flex flex-wrap bg-pink w-[500px]">
            </div>
            <div class="bg-bermuda w-[500px]">
            </div>
        </div>
        <div class="flex flex-col items-center">
            <form method="post">
            <table class="text-back">
                <!-- donde se genera la tabla de butacas -->
            </table> 
                <div class="grid grid-cols-3 w-[325px] h-[77px] mt-[40px] items-center mx-auto">
                    <div class=" flex flex-col items-center">
                        <img class="h-[40px]" src="app/view/images/butacaBlanca.svg" alt="">
                        <span>Disponible</span>
                    </div>
                    <div class=" flex flex-col items-center">
                        <img class="h-[40px]" src="app/view/images/butacaGris.svg" alt="">
                        <span>No disponible</span>
                    </div>
                    <div class=" flex flex-col items-center">
                        <img class="h-[40px]" src="app/view/images/butacaMorada.svg" alt="">
                        <span>Seleccionada</span>
                    </div>
                </div>
                <input type="submit" class="w-[100%] mt-[60px] bg-pink h-[86px] rounded-[7px] font-600 text-2xl cursor-pointer" value="Comprar">
            </form>
        </div>
     </main>
     <?php include("footer.php"); ?>  
    <?php
        $sala=explode(",",$_POST["fechas"]);
        if ($sala[1]!="Sala VIP") {
            echo "<script src='app/view\js\butacasRaras.js'></script>";
        }else{
            echo "<script src='app/view\js\butacasW.js'></script>";
        }
    ?>
</body>
</html>