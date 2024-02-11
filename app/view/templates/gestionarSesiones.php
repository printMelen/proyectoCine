<div class="container mx-auto py-8 font-600">
  <h1 class="text-2xl font-bold mb-6 text-18.75 text-center">Gestionar sesiones</h1>
  <form method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" enctype="multipart/form-data">
    <div class="mb-4">
      <label for="director">Seleccionar película:
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" list="peliculas" name="pelicula" id="pelicula" placeholder="El Padrino">
      </label>
      <datalist id="peliculas">
        <?php
        foreach ($_SESSION['peliculasSesiones'] as $peli) {
          echo "<option value='" . $peli['nombre_pelicula']. "'></option>";
        }
        ?>
      </datalist>
    </div>
    <div class="mb-4">
      <label for="salas">Seleccionar sala:
      </label>
      <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="salas" name="salas">
        <?php 
        foreach ($_SESSION['salasSesiones'] as $sala) {
          echo "<option value='".$sala['id']."'>" . $sala['nombre'] . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-15  mb-2" for="fecha">Fecha de la sesión:</label>
      <input class="w-full px-3 py-2 border border-gray-300 text-15 rounded-md focus:outline-none focus:border-indigo-500" type="date" id="fecha" name="fecha" min="
      <?php 
        $fechaMinima = date('d-m-Y', strtotime('+1 days'));
        echo $fechaMinima;
      ?>">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-15  mb-2" for="hora">Hora de la sesión:</label>
      <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="hora" name="hora">
        <?php
        foreach ($_SESSION['horasSesiones'] as $hora) {
          $timeObject = DateTime::createFromFormat('H:i:s', $hora['hora']);
          $formattedTime = $timeObject->format('H:i');
          echo "<option value='".$hora['hora']."'>" . $formattedTime . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="mb-4">
    <label class="block text-gray-700 text-15  mb-2" for="precio">Precio de la entrada:</label>
    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="precio" id="precio" placeholder="10">
    </div>
    <div class="mb-4">
    <span class="text-[#ef233c]">
        <?php
        if (isset($_SESSION["errorSesion"])) {
          echo $_SESSION["errorSesion"];
        }
        ?>
      </span>
    </div>
    <button class="w-full bg-pink text-back text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300" type="submit">Añadir</button>
  </form>
</div>