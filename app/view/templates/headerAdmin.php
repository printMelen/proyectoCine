<header class="flex h-[100%] container max-w-screen-xs justify-end pt-[14px] ">
<!-- minmax(480px,819px) -->
<!-- grid-cols-[180px_891px_121px] -->
    <nav class="flex text-18.75 font-400">
        <div class="flex items-center gap-[20px]">
             <?php
                if ($_SESSION["logeado"]) {
                    echo $_SESSION['nombre'];
                    echo " ";
                    echo $_SESSION['rol'];
                    echo '<img src="app/view/images/' . $_SESSION["avatar"] . '" class="w-[30px] h-[30px]" alt="" srcset="">';
                    echo '<a href="index.php?peticion=logout">Logout</a>';
                }
            ?>
            <!-- <a href="#"><img src="app/view/images/usuario.svg" alt="" srcset=""></a>
            <a href="index.php?peticion=logout" class="">Logout</a> -->
        </div>
    </nav>
</header>