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
            <?php
            include $_GET['peticion'].'.php';
            ?>

        </div>
     </main>
     <footer>

     </footer>
     <script src="assets/js/custom.js"></script>
</body>
</html>