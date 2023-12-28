<main>
  

<form class="w-[80%] mt-[20px] mx-auto">
    <div class="flex">
      <select class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" name="categoria" id="">
        <option value="animacion">Animación</option>
        <option value="comedia">Comedia</option>
      </select>        
        <div class="relative w-full">
            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Nombre de la película">
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-back bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <img src="../images/lupa.svg" alt="" srcset="">
            </button>
        </div>
    </div>
</form>

<div class="min-h-screen grid place-items-center font-mono text-[#d1d5db] bg-gray-900">
      
      <div class="bg-[#1f2937] rounded-md bg-gray-800 shadow-lg">
        <div class="md:flex px-4 leading-none max-w-4xl">
          <div class="flex-none ">
           <img
            src="../images/joker.jpg"
            alt="pic"
            class="h-72 w-56 rounded-md transform -translate-y-4 border-4 border-gray-300 shadow-lg"
          />           
          </div>

          <div class="flex-col text-gray-300">
   
            <p class="pt-4 text-2xl font-bold">Joker (2020)</p>
            <hr class="hr-text" data-content="">
            <div class="text-md flex justify-between px-4 my-2">
              <span class="font-bold">2h 2min | Crime, Drama, Thriller</span>
              <span class="font-bold"></span>
            </div>
            <p class="hidden md:block px-4 my-4 text-sm text-left">In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker. </p>
            
            <p class="flex text-md px-4 my-2">
              Rating: 9.0/10 
              <span class="font-bold px-2">|</span>
              Mood: Dark
            </p>
            
            <div class="text-xs flex">              
              <a href="#" class="h-[100%] flex items-center border border-gray-400 text-gray-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-900 focus:outline-none focus:shadow-outline bg-pink">Borrar <img class="h-[25px]" src="../images/MaterialSymbolsDeleteForever.svg" alt="" srcset=""></a>
            </div>
          </div>
        </div>
                 
      </div>
    </div>
</main>