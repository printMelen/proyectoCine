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
     <!-- <link href="../css/dist/output.css" rel="stylesheet"> -->

</head>

<body class="container text-white bg-back max-w-screen-2xl mx-auto font-Poppins">
    <?php include("header.php"); ?>
     <main class="flex flex-col py-[30px] px-[68px] h-[100%] bg-[#0A031C]">
        <h1 class="text-center text-white font-600 text-[25px] mb-6">ENTRADAS:</h1>
        <div class="flex items-center mx-auto border rounded-lg shadow-lg w-[1500px]">
            <table class="w-[100%] text-white">
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Película</th>
                      <th>Sala</th>
                      <th>Fecha</th>
                      <th>Asiento</th>
                      <th>Qr</th>
                  </tr>
              </thead>
                  <?php
                  $fecha = date("Y-m-d");
                //   echo "<pre>";
                //     var_dump($_SESSION['datosPelis']);
                //     echo "</pre>";
                  foreach (explode(',',$_COOKIE["butacas"]) as $key => $butaca) {
                      $qr=QrController::generarQr("Usuario:" . $_SESSION["nombre"] . "Asiento:" . $butaca . "Fecha:" . $fecha);
                      $name=explode("/",$qr);
                      echo <<< EOT
                          <tr>
                              <td class="text-center">{$_SESSION['nombre']}</td>
                              <td class="text-center">{$_SESSION['datosPelis'][0]['nombre_peli']}</td>
                              <td class="text-center">{$_SESSION['datosPelis'][0]['nombre_sala']}</td>
                              <td class="text-center">{$fecha}</td>
                              <td class="text-center">{$butaca}</td>
                              <td><img src=$qr alt="" srcset="" class="mx-auto"></td>
                              <td><a href="$qr" download="$name[2]">Descargar QR</a></td>
                          </tr>
                      EOT;
                  }
                  ?>
            </table>
        </div>
     </main>
     <script src="../js/custom.js"></script>
</body>
<?php include("app/view/templates/footer.php"); ?>
</html>