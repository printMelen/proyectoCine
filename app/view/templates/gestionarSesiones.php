<div class="container mx-auto py-8 font-600">
  <h1 class="text-2xl font-bold mb-6 text-18.75 text-center">Gestionar sesiones</h1>
  <form method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" enctype="multipart/form-data">
    <div class="mb-4">
      <label for="director">Seleccionar película:
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" list="directores" name="director" id="director" placeholder="Vicky Jenson">
      </label>
      <datalist id="directores">
        <?php
        foreach ($_SESSION['directores'] as $director) {
          echo "<option value='" . $director['nombre']. "'></option>";
        }
        ?>
      </datalist>
    </div>
    <div class="mb-4">
      <label for="director">Seleccionar sala:
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" list="directores" name="director" id="director" placeholder="Vicky Jenson">
      </label>
      <datalist id="directores">
        <?php
        foreach ($_SESSION['directores'] as $director) {
          echo "<option value='" . $director['nombre']. "'></option>";
        }
        ?>
      </datalist>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-15  mb-2" for="fecha">Fecha de la sesión:</label>
      <input class="w-full px-3 py-2 border border-gray-300 text-15 rounded-md focus:outline-none focus:border-indigo-500" type="date" id="fecha" name="fecha" min="
      <?php 
        $fechaMinima = date('Y-m-d', strtotime('+1 days'));
        echo $fechaMinima;
      ?>">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-15  mb-2" for="edadMinima">Hora de la sesión:</label>
      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" type="number" id="edadMinima" name="edadMinima" placeholder="7">
    </div>
    <div class="mb-4">
    <label class="block text-gray-700 text-15  mb-2" for="genero">Precio de la entrada:</label>
    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="genero" name="genero">
        <?php
        foreach ($_SESSION['generos'] as $genero) {
          echo "<option value='" . $genero['id']. "'>" . $genero['nombre'] . "</option>";
        }
        ?>
      </select>
    </div>
    <!-- <div class="mb-4">
      <label class="block text-gray-700 text-15 mb-2" for="director">Director:</label>
      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" type="text" id="director" name="director" placeholder="Vicky Jenson">
    </div> -->
    
    <div class="mb-4">
      <label for="actor">Actor/Actriz:
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" list="elenco" name="actor" id="actor" placeholder="Eddie Murphy">
      </label>
      <datalist id="elenco">
        <?php
        foreach ($_SESSION['actores'] as $actor) {
          echo "<option value='" . $actor['nombre']. "'></option>";
        }
        ?>
      </datalist>
    </div>
    <div class="mb-4">
    <span class="text-[#ef233c]">
        <?php
        if (isset($_SESSION["errorPeli"])) {
          echo $_SESSION["errorPeli"];
        }
        ?>
      </span>
    </div>
    <button class="w-full bg-pink text-back text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300" type="submit">Añadir</button>
  </form>
</div>