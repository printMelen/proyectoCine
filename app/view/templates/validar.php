<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
    <link href="app/view/css/dist/output.css" rel="stylesheet">
</head>

<body class="container bg-back max-w-screen-2xl mx-auto font-Poppins h-screen flex flex-col justify-center">
    <header class="container max-w-screen-xl mx-auto pt-[14px] pb-[10px]">
        <nav>
            <a href="index.php">
                <img src="app/view/images/playOn.svg" alt="" srcset="">
            </a>
        </nav>
    </header>
    <main class="container max-w-screen-2xl bg-backLogin h-[690px] flex flex-col justify-center">
        <div class="h-[516px] w-[500px] mx-auto bg-login backdrop-blur-[10px] rounded-[15px] flex flex-col justify-center">

            <div class="block rounded-lg text-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50">
                    <h2 class="text-3xl"> Autentificación</h2>
                </div>
                <div class="p-6">
                    <blockquote>
                        <p class="text-xl">
                            Hemos mandado un correo a la dirección de tu cuenta:<br>
                            <?= $_SESSION["correo"] ?> <br>dale click al enlace para validar tu cuenta
                        </p>
                    </blockquote>

                </div> 
            </div>


        </div>
    </main>
    <footer>

    </footer>
    <script src="assets/js/custom.js"></script>
</body>

</html>