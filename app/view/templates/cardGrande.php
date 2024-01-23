<div class="grid grid-rows-[265px_46px_53px] p-[35px] h-[466px] w-[653px] bg-[#1D1731] rounded-[15.8px]">
    <img class="w-[100%] h-[100%]" src="app/view/images/caratula/<?php echo $_SESSION['datosPelis'][$i]['cartel'];
    ?>" alt="">
    <div class="flex justify-between pt-[28px]">
        <span>
            <?php
                echo rand(1,9).".".rand(0,9);
            ?>
        </span>
        <span>2023</span>
        <div class="flex gap-[30px]">
            <span>
                <?php echo $_SESSION['datosPelis'][$i]['nombre_genero']?>
            </span>
            <span>2:21</span>
            <span>
                <?php
                echo $_SESSION['datosPelis'][$i]['clasificacion_edad'];
                ?>
            </span>
        </div>
        <div>
            <span>Director: Louis Leterrier</span>
        </div>
    </div>
    <div class="flex justify-between mt-[37px] items-center h-[53px]">
        <div>
            <button class="w-[144px] bg-[#FFFFFF33] h-[53px] rounded-[6.25px] mr-[24px]">Trailer</button>
            <button class="w-[144px] bg-pink h-[53px] rounded-[6.25px]">Comprar</button>
        </div>
        <div class="flex items-center">
            <button>
                <img src="app/view/images/corazon.svg" alt="" srcset="">
            </button>
            <button>
                <img src="app/view/images/bookmark.svg" alt="" srcset="">
            </button>
        </div>
    </div>
</div>