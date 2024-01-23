<div class="container flex  max-w-screen-1500 mx-auto  justify-center items-center">
    <button class=" bg-[#F6F6F666] rounded-[5px] shadow-md h-[48px] w-[37px] text-2xl text-indigo-600 hover:text-indigo-400 focus:text-indigo-400 focus:outline-none focus:shadow-outline">
        <img class="mx-auto" src="app/view/images/flechaIzquierda.svg" alt="" srcset="">
    </button>
    <div class="container max-w-screen-1400 flex gap-[40px] mx-auto justify-center my-[20px]">
        <?php
        for ($i = 0; $i < 6; $i++) {
            echo <<<EOT
            <a href="index.php?peticion=moviePreview&id=$i">
                <img class="w-[200px] h-[300px] rounded-xl shadow-xl" src="app/view/images/joker.jpg" alt="" srcset="">
            </a>
            EOT;
        }
        ?>
    </div>

    <button class=" bg-[#F6F6F666] rounded-[5px] shadow-md h-[48px] w-[37px] text-2xl text-indigo-600 hover:text-indigo-400 focus:text-indigo-400 focus:outline-none focus:shadow-outline">
        <img class="mx-auto" src="app/view/images/flechaDerecha.svg" alt="" srcset="">
    </button>
</div>