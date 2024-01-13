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
     <section class="mb-32">
    <div class="flex flex-wrap">
      <div class="mb-12 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-5/12">
        <div class="flex lg:py-12">
          <img src="app/view/images/validacion.jpg"
            class="w-full rounded-lg shadow-lg dark:shadow-black/20 lg:ml-[50px] z-[10]" alt="image" />
        </div>
      </div>
      <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
        <div class="flex h-full items-center rounded-lg bg-primary p-6 text-center text-white lg:pl-12 lg:text-left">
          <div class="lg:pl-12">
            <h2 class="mb-6 text-3xl font-bold">
              ¡Tu cuenta ya ha sido validada! 😎
            </h2>
            <p class="mb-6 pb-2 lg:pb-0">
              Ya puedes disfrutar de la experiencia de nuestra página web al
              máximo nivel.<br>
              Dale click al botón para volver a la página principal con tu sesión ya iniciada.
            </p>
            <a href="index.php?peticion=default">
                <button type="button"
                  class="rounded-full border-2 bg-pink border-neutral-50 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-100 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200"
                  data-te-ripple-init data-te-ripple-color="light">
                  Página principal
                </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
     </main>
     <?php include("app/view/templates/footer.php"); ?>
     <script src="../js/custom.js"></script>
</body>

</html>