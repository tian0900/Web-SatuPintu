
@extends('layout.sidebarutama')
<!-- ============= Home Section =============== -->
@section('content')
<div class="content">
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            <div>
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bx-money-withdraw'></i></p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Target Tahun Ini</h5>
                    <Here class="text-2xl text-gray-900 dark:text-white">Rp. 400.000.000</p>
                </a>
            </div>
            <div>
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bx-money'></i></p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Penerimaan Hari Ini</h5>
                    <Here class="text-2xl text-gray-900 dark:text-white">Rp. 400.000.000</p>
                </a>
            </div>
            <div>
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <p class="text-4xl text-gray-900 dark:text-white"><i class='bx bx-credit-card-front'></i></p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Persentase Realisasi</h5>
                    <Here class="text-2xl text-gray-900 dark:text-white">50.00003 %</p>
                </a>
            </div>
        </div>
    </div>
  </section>
  
  <section class="bg-white dark:bg-gray-900 ">
      <div class=" mx-auto max-w-screen-xl ">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3 dark:bg-gray-800">
                              Jenis Penerimaan
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Target 2024
                          </th>
                          <th scope="col" class="px-6 py-3 dark:bg-gray-800">
                              Penerimaan Hari Ini
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Persen (%)
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              Ret. Pasar
                          </th>
                          <td class="px-6 py-4">
                              20
                          </td>
                          <td class="px-6 py-4 dark:bg-gray-800">
                              6.890.000
                          </td>
                          <td class="px-6 py-4">
                              70%
                          </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              Ret. Pasar
                          </th>
                          <td class="px-6 py-4">
                              20
                          </td>
                          <td class="px-6 py-4 dark:bg-gray-800">
                              6.890.000
                          </td>
                          <td class="px-6 py-4">
                              70%
                          </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              Ret. Parkir
                          </th>
                          <td class="px-6 py-4">
                              20
                          </td>
                          <td class="px-6 py-4 dark:bg-gray-800">
                              6.890.000
                          </td>
                          <td class="px-6 py-4">
                              70%
                          </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              Ret. Terminal
                          </th>
                          <td class="px-6 py-4">
                              40
                          </td>
                          <td class="px-6 py-4 dark:bg-gray-800">
                              10.890.000
                          </td>
                          <td class="px-6 py-4">
                              80%
                          </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              Ret. Pasar
                          </th>
                          <td class="px-6 py-4">
                              20
                          </td>
                          <td class="px-6 py-4 dark:bg-gray-800">
                              6.890.000
                          </td>
                          <td class="px-6 py-4">
                              70%
                          </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              Total
                          </th>
                          <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              600
                          </th>
                          <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              60.000.000
                          </th>
                          <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              60%
                          </th>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      
  </section>
</div>

@endsection