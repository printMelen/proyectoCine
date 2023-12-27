<div class="container mx-auto py-8 text-18.75 font-600">
    <h1 class="text-2xl font-bold mb-6 text-center">Añadir una película</h1>
    <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
      <div class="mb-4">
        <label class="block text-gray-700 text-15 mb-2" for="name">Nombre:</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="name" name="name" placeholder="Shrek">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-15  mb-2" for="argumento">Argumento:</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="argumento" name="argumento" placeholder="En una misión para rescatar a una hermosa princesa de las garras de un dragón">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-15  mb-2" for="caratula">Carátula:</label>
        <input class="w-full px-3 py-2 border border-gray-300 text-15 rounded-md focus:outline-none focus:border-indigo-500"
          type="file" id="caratula" name="caratula">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-15  mb-2" for="edadMinima">Edad mínima:</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="number" id="edadMinima" name="edadMinima" placeholder="7">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-15  mb-2" for="genero">Género:</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="genero" name="genero" placeholder="Animación">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-15 mb-2" for="nombreRol"><select class="w-[420px]" name="rol" id="rol">
          <option value="Director">Director</option>
          <option value="Actriz">Actriz</option>
          <option value="Actor">Actor</option>
        </select>:</label>
        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
          type="text" id="nombreRol" name="nombreRol" placeholder="Vicky Jenson">
      </div>
      <button
        class="w-full bg-pink text-back text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
        type="submit">Añadir</button>
    </form>
  </div>