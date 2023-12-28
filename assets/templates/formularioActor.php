<div class="container mx-auto py-8 font-600">
  <h1 class="text-2xl font-bold mb-6 text-18.75 text-center">Añadir personal</h1>
  <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
    <div class="mb-4">
      <label class="block text-gray-700 text-15 mb-2" for="name">Nombre:</label>
      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" type="text" id="name" name="name" placeholder="Jason Momoa">
    </div>
    
    <div class="mb-4">
      <label class="block text-gray-700 text-15  mb-2" for="imagen">Imagen:</label>
      <input class="w-full px-3 py-2 border border-gray-300 text-15 rounded-md focus:outline-none focus:border-indigo-500" type="file" id="imagen" name="imagen">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-15 mb-2" for="rol">
        Rol:</label>
        <select class="p-[10px] rounded-lg" name="rol" id="rol">
          <option value="Director">Director</option>
          <option value="Actriz">Actriz</option>
          <option value="Actor">Actor</option>
        </select>
    </div>
    <button class="w-full bg-pink text-back text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300" type="submit">Añadir</button>
  </form>
</div>