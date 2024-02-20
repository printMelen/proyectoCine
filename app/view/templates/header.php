<header class="container max-w-screen-xl mx-auto pt-[14px]">
<!-- minmax(480px,819px) -->
<!-- grid-cols-[180px_891px_121px] -->
    <nav class="grid grid-cols-2 items-center justify-between text-18.75 font-400">
        <div class="flex items-center gap-[54px]">
            <a href="index.php">
                <img src="app/view/images/playOn.svg" alt="" srcset="">
            </a>
            <ul class="text-white flex gap-[50px]">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?peticion=movies">Movies</a></li>
                <li><a href="#">Series</a></li>
                <li><a href="#">Top</a></li>
            </ul>
        </div>
        <div class="flex items-center gap-[25px] justify-end">
            <a href="index.php?peticion=movies" >
                <img src="app/view/images/lupa.svg" alt="" srcset="">
            </a>
            <a href="#">
                <img src="app/view/images/campana.svg" alt="" srcset="">
            </a>
            <?php
                if (!$_SESSION["logeado"]) {
                    echo <<<EOT
                    <a href="index.php?peticion=login">
                        <img src="app/view/images/usuario.svg" alt="" srcset="">
                    </a>
                    EOT;
                }
            ?>
            <?php
                if ($_SESSION["logeado"]) {
                    echo $_SESSION['nombre'];
                    echo " ";
                    echo $_SESSION['rol'];
                    echo '<img src="app/view/images/' . $_SESSION["avatar"] . '" class="w-[30px] h-[30px]" alt="" srcset="">';
                    echo '<a href="index.php?peticion=logout">Logout</a>';
                }
            ?>
        </div>
    </nav>
</header>