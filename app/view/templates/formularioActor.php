<div class="container mx-auto py-8 font-600">
  <h1 class="text-2xl font-bold mb-6 text-18.75 text-center">Añadir personal</h1>
  <form method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" enctype="multipart/form-data">
    <div class="mb-4">
      <label class="block text-gray-700 text-15 mb-2" for="nameElenco">Nombre:</label>
      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" type="text" id="nameElenco" name="nameElenco" placeholder="Jason Momoa">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-15  mb-2" for="imagenElenco">Imagen:</label>
      <input class="w-full px-3 py-2 border border-gray-300 text-15 rounded-md focus:outline-none focus:border-indigo-500" type="file" id="imagenElenco" name="imagenElenco">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-15 mb-2" for="rolElenco">
        Rol:</label>
      <select class="p-[10px] rounded-lg" name="rolElenco" id="rolElenco">
        <option value="Director">Director</option>
        <option value="Actriz">Actriz</option>
        <option value="Actor">Actor</option>
      </select>
    </div>
    <div class="mb-4">
      <span class="text-[#ef233c]">
        <?php
        if ($_SESSION['error'] != "") {
          echo $_SESSION['error'];
        }
        ?>
      </span>
    </div>
    <button class="w-full bg-pink text-back text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300" type="submit">Añadir</button>
  </form>
</div>