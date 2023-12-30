<!-- component -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css">
<div class="flex flex-wrap -mx-3 mb-5">
  <div class="w-full max-w-full px-3 mb-6  mx-auto">
    <div class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
      <div class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
        <!-- card header -->
        <div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
          <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
            <span class="mr-3 font-semibold text-dark">Usuarios</span>
          </h3>
        </div>
        <!-- end card header -->
        <!-- card body  -->
        <div class="flex-auto block py-8 pt-6 px-9">
          <div class="overflow-x-auto">
            <table class="w-full my-0 align-middle text-dark border-neutral-200">
              <thead class="align-bottom">
                <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                  <th class="pb-3 text-start min-w-[175px]">Avatar y nombre</th>
                  <th class="pb-3 text-end min-w-[100px]">Email</th>
                  <th class="pb-3 text-end min-w-[100px]">NIF</th>
                  <th class="pb-3 pr-12 text-end min-w-[175px]">Rol</th>
                  <th class="pb-3 pr-12 text-end min-w-[100px]">Activo</th>
                  <th class="pb-3 text-end min-w-[50px]">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-dashed last:border-b-0">
                  <td class="p-3 pl-0">
                    <div class="flex items-center">
                      <div class="relative inline-block shrink-0 rounded-2xl me-3">
                        <img src="../images/peepogafas.gif" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                      </div>
                      <div class="flex flex-col justify-start">
                        <span>Admin</span>
                      </div>
                    </div>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="font-semibold text-light-inverse text-md/normal">Olivia Cambell</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                      </svg> 6.5% </span>
                  </td>
                  <td class="p-3 pr-12 text-end">
                    <span class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-primary bg-primary-light rounded-lg"> In Progress </span>
                  </td>
                  <td class="pr-0 text-start">
                    <span class="font-semibold text-light-inverse text-md/normal">2023-08-23</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <button class="ml-auto relative text-secondary-dark bg-light-dark hover:text-primary flex items-center h-[25px] w-[25px] text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-200 ease-in-out shadow-none border-0 justify-center">
                      <span class="flex items-center justify-center p-0 m-0 leading-none shrink-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                      </span>
                    </button>
                  </td>
                </tr>
                <tr class="border-b border-dashed last:border-b-0">
                  <td class="p-3 pl-0">
                    <div class="flex items-center">
                      <div class="relative inline-block shrink-0 rounded-2xl me-3">
                        <img src="../images/peepoPapaNoel.gif" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                      </div>
                      <div class="flex flex-col justify-start">
                        <span>Pedro Picapiedra</span>
                      </div>
                    </div>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="font-semibold text-light-inverse text-md/normal">Luca Micloe</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-danger bg-danger-light rounded-lg">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                      </svg> 2.7% </span>
                  </td>
                  <td class="p-3 pr-12 text-end">
                    <span class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-light-inverse bg-light rounded-lg"> Under Review </span>
                  </td>
                  <td class="pr-0 text-start">
                    <span class="font-semibold text-light-inverse text-md/normal">2024-04-11</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <button class="ml-auto relative text-secondary-dark bg-light-dark hover:text-primary flex items-center h-[25px] w-[25px] text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-200 ease-in-out shadow-none border-0 justify-center">
                      <span class="flex items-center justify-center p-0 m-0 leading-none shrink-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                      </span>
                    </button>
                  </td>
                </tr>
                <tr class="border-b border-dashed last:border-b-0">
                  <td class="p-3 pl-0">
                    <div class="flex items-center">
                      <div class="relative inline-block shrink-0 rounded-2xl me-3">
                        <img src="../images/peepoPc.gif" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                      </div>
                      <div class="flex flex-col justify-start">
                        <span>Álvaro Redondo Rodríguez</span>
                      </div>
                    </div>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="font-semibold text-light-inverse text-md/normal">Bianca Winson</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                      </svg> 6.8% </span>
                  </td>
                  <td class="p-3 pr-12 text-end">
                    <span class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-primary bg-primary-light rounded-lg"> In Progress </span>
                  </td>
                  <td class="pr-0 text-start">
                    <span class="font-semibold text-light-inverse text-md/normal">2024-02-10</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <button class="ml-auto relative text-secondary-dark bg-light-dark hover:text-primary flex items-center h-[25px] w-[25px] text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-200 ease-in-out shadow-none border-0 justify-center">
                      <span class="flex items-center justify-center p-0 m-0 leading-none shrink-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                      </span>
                    </button>
                  </td>
                </tr>
                <tr class="border-b border-dashed last:border-b-0">
                  <td class="p-3 pl-0">
                    <div class="flex items-center">
                      <div class="relative inline-block shrink-0 rounded-2xl me-3">
                        <img src="../images/avatarSudadera.png" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
                      </div>
                      <div class="flex flex-col justify-start">
                        <span>Julio Pérez</span>
                      </div>
                    </div>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="font-semibold text-light-inverse text-md/normal">Roberto Alliton</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <span class="text-center align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                      </svg> 4.5% </span>
                  </td>
                  <td class="p-3 pr-12 text-end">
                    <span class="text-center align-baseline inline-flex px-4 py-3 mr-auto items-center font-semibold text-[.95rem] leading-none text-success bg-success-light rounded-lg"> Done </span>
                  </td>
                  <td class="pr-0 text-start">
                    <span class="font-semibold text-light-inverse text-md/normal">2023-05-31</span>
                  </td>
                  <td class="p-3 pr-0 text-end">
                    <button class="ml-auto relative text-secondary-dark bg-light-dark hover:text-primary flex items-center h-[25px] w-[25px] text-base font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-200 ease-in-out shadow-none border-0 justify-center">
                      <span class="flex items-center justify-center p-0 m-0 leading-none shrink-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                      </span>
                    </button>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="flex flex-wrap -mx-3 mb-5">
  <div class="w-full max-w-full sm:w-3/4 mx-auto text-center">
  <button type="button" class="border border-pink p-[10px] w-[80%] rounded-xl shadow-2xl">Mostrar más</button>
  </div>
</div>