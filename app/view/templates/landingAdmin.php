<div class="container my-24 mx-auto md:px-6">
    <section class="mb-32 text-center lg:text-left">
        <h2 class="mb-12 text-center text-3xl font-bold">
            Hola
            <?php
            echo $_SESSION['nombre'];
            ?>, bienvenid@ al panel admin
        </h2>

        <div class="grid gap-6 md:grid-cols-3 xl:gap-x-12">
            <a href="index.php?peticion=formularioPeli">
                <div class="mb-6 lg:mb-0">
                    <div class="relative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex-row items-center lg:flex">
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                <img src="app/view/images/MaterialSymbolsAddCircleOutline.svg" class="mb-6 w-full rounded-md lg:mb-0" />
                            </div>
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                <h5 class="mb-2 text-lg font-bold">Añadir película</h5>
                                <p class="mb-4 text-neutral-500 dark:text-neutral-300">Formulario para añadir películas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="index.php?peticion=formularioActor">
                <div class="mb-6 lg:mb-0">
                    <div class="relative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex-row items-center lg:flex">
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                <img src="app/view/images/MingcuteUserAdd2Fill.svg" class="mb-6 w-full rounded-md lg:mb-0" />
                            </div>
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                <h5 class="mb-2 text-lg font-bold">Añadir elenco</h5>
                                <p class="mb-4 text-neutral-500 dark:text-neutral-300">Formulario para añadir Director/actor/actriz</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="index.php?peticion=gestionarSesiones">
                <div class="mb-6 lg:mb-0">
                    <div class="relative block rounded-lg p-6 bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex-row items-center lg:flex">
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-5/12 lg:pr-6">
                                <img src="app/view/images/sesiones.svg" class="mb-6 w-full rounded-md lg:mb-0" />
                            </div>
                            <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                                <h5 class="mb-2 text-lg font-bold">Gestión sesiones</h5>
                                <p class="mb-4 text-neutral-500 dark:text-neutral-300">Gestionar las sesiones de las películas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
</div>