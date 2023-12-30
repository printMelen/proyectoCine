<div class="container grid grid-cols-[50px_1000px_50px] max-w-screen-1200 mx-auto  justify-center items-center">
    <button class="  bg-white rounded-full shadow-md h-12 w-12 text-2xl text-indigo-600 hover:text-indigo-400 focus:text-indigo-400 focus:outline-none focus:shadow-outline">
        <span class="block" style="transform: scale(-1);">&#x279c;</span>
    </button>
    <div class="container max-w-screen-sm flex flex-wrap gap-[40px] mx-auto justify-center my-[20px]">
        <?php
        for ($i = 0; $i < 8; $i++) {
            echo <<<EOT
            <a href="#">
                <img class="w-[200px] h-[300px] rounded-xl shadow-xl" src="../images/joker.jpg" alt="" srcset="">
            </a>
            EOT;
        }
        ?>
    </div>

    <button class=" bg-white rounded-full shadow-md h-12 w-12 text-2xl text-indigo-600 hover:text-indigo-400 focus:text-indigo-400 focus:outline-none focus:shadow-outline">
        <span class="block" style="transform: scale(1);">&#x279c;</span>
    </button>
</div>