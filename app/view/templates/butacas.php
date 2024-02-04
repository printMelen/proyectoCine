
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
     <?php
        $sala=explode(",",$_POST["fechas"]);
        $url = "http://localhost:80/dwes/proyectoCine/api/v1/cine/sesiones?dia=".$sala[0];
        $response = file_get_contents($url);
        $datosDia = json_decode($response, true);
        // echo "<pre>";
        // print_r($datosDia);
        // echo "</pre>";
        $url = "http://localhost:80/dwes/proyectoCine/api/v1/cine/butacas/".$datosDia[0]['id_sesion'];
        echo $url;
        $response = file_get_contents($url);
        $butacasOcupadas = json_decode($response, true);
        echo "<pre>";
        print_r($butacasOcupadas);
        echo "</pre>";
     ?>
     <main class="flex flex-col mt-5 gap-5">
        <div class="grid grid-cols-2 bg-[#1D1731] mx-auto w-[1500px] max-w-screen-xl rounded-[15.833px] h-[259px] justify-center py-6">
                <div class="grid grid-rows-2 items-center justify-center gap-2">
                    <div class="flex flex-wrap gap-[48px]">
                        <button class="w-[111px] h-[59px] rounded-[6.26px] bg-grey"><?=$sala[1]?></button>
                        <button class="w-[111px] h-[59px] rounded-[6.26px] bg-greyBotones"><?=$sala[1]?></button>
                    </div>
                    <div class="flex flex-wrap gap-[48px]">
                        <?php
                        $horas=array();
                        foreach ($datosDia as $key => $diaInfo) {
                            array_push($horas,$diaInfo['hora_sesion']);
                        }
                        foreach ($_SESSION['horas'] as $key => $hora) {
                            // echo "<pre>";
                            $timeObject = DateTime::createFromFormat('H:i:s', $hora['hora']);
                            $formattedTime = $timeObject->format('H:i');
                            if (in_array($hora['hora'], $horas)) {
                                echo <<<EOT
                                <button class="w-[111px] h-[59px] rounded-[6.26px] bg-pink">$formattedTime</button>
                                EOT;
                            }else{
                                echo <<<EOT
                                <button disable class="w-[111px] h-[59px] rounded-[6.26px] bg-pink opacity-50">$formattedTime</button>
                                EOT;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="flex flex-col flex-wrap mx-auto gap-2">
                    <h2 class="text-white text-[30px]"><?=$sala[1]?></h2>
                    <span>Elige tus entradas</span>
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
        if ($sala[1]!="Sala VIP") {
            echo "<script src='app/view\js\butacasRaras.js'></script>";
        }else{
            echo "<script src='app/view\js\butacasW.js'></script>";
        }
    ?>
</body>
</html>