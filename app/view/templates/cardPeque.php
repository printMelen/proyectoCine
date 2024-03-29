<div class="grid grid-rows-[190px_40px_40px_42px] py-[20px] px-[30px] h-[396px] w-[415px] bg-[#1D1731] rounded-[15.8px]">
    <img class="w-[100%] h-[100%]" src="app/view/images/caratula/<?php echo $datos[$i+2]['cartel'];
    ?>" alt="">
    <div class="flex flex-wrap justify-between pt-[22px]">
        <span>
            <?php
                echo random_int(1,9).".".random_int(0,9);
            ?>
        </span>
        <span>
            <?php
                echo random_int(1950, date("Y"));
            ?>
        </span>
        <div class="flex gap-[30px]">
            <span>
            <?php echo $datos[$i+2]['nombre_genero']?>
            </span>
            <span>
                <?php
                    echo random_int(1,6).":".random_int(0,6)."0";
                ?>
            </span>
            <span>
            <?php
                echo $datos[$i+2]['clasificacion_edad'];
            ?>
            </span>
        </div>
    </div>
    <div class="mt-[26px]">
        <span class="">
            <?php
                if ($datos[$i+2]['nombre_director']!=NULL) {
                    echo "Director: ". $datos[$i+2]['nombre_director'];
                }
                ?>
        </span>
    </div>
    <div class="flex justify-between mt-[32px] items-center h-[53px]">
        <div>
            <button class="w-[116px] bg-[#FFFFFF33] h-[42px] rounded-[6.25px] mr-[24px]">Trailer</button>
            <button class="w-[116px] bg-pink h-[42px] rounded-[6.25px]">Comprar</button>
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