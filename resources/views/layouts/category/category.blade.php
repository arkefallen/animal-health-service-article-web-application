@extends('layouts/master')

@section('title')
<title>Kategori Artikel</title>
@endsection

@section('content')

<body>
  <x-top-nav :user_email="$userEmail" :username="$userName" />
  <div id="addCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Tambah Kategori
          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addCategoryModal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Tutup modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form action="{{ route('category.store') }}" method="post">
          @csrf
          <div class="grid gap-4 mb-4 grid-cols-1">
            <div>
              <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
              <input type="text" name="category_name" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik nama kategori" required="">
            </div>
          </div>
          <button type="submit" class="text-white inline-flex items-center bg-blue-900 hover:bg-blue-950 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
            Tambah Data
          </button>
        </form>
      </div>
    </div>
  </div>

  <x-sidebar />

  <div class="sm:ml-64 pt-16 px-8">
    <x-success-popup-notification :session_status="Session::has('success_create_category')" session_title="Proses tambah berhasil" :session_message="Session::get('success_create_category')" />
    <x-success-popup-notification :session_status="Session::has('success_delete_category')" session_title="Hapus data berhasil" :session_message="Session::get('success_delete_category')" />
    <x-failed-popup-notification :session_status="Session::has('failed_store_category')" session_title="Gagal tambah data" :session_message="Session::get('failed_store_category')" />
    <x-success-popup-notification :session_status="Session::has('success_update_category')" session_title="Ubah data berhasil" :session_message="Session::get('success_update_category')" />

    <h1 class="mt-4 mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">Daftar Kategori Artikel</h1>
    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3">
      <button id="addCategoryModalButton" data-modal-target="addCategoryModal" data-modal-toggle="addCategoryModal" type="button" class="flex items-center justify-center text-white bg-blue-900 hover:bg-blue-950 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Tambah Kategori
      </button>
    </div>
    <div class="rounded-lg border border-gray-200 mt-6">
      <div class="overflow-x-auto rounded-t-lg">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
          <thead class="ltr:text-left rtl:text-right">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Kategori</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Aksi</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            @foreach($categories as $category)
            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$category->category_name}}</td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700f flex flex-row">
              <button id="editCategoryModalButton" data-modal-target="editCategoryModal-{{ $category->id }}" data-modal-toggle="editCategoryModal-{{ $category->id }}" type="button" class="mx-2 inline-block rounded border border-green-600 bg-green-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600 focus:outline-none focus:ring active:text-green-500">
                Edit
              </button>
              <form action="{{ route('category.destroy', $category->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="mx-2 inline-block rounded border border-red-600 bg-red-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500" onclick="return confirm('Yakin ingin hapus kategori?')">
                  Hapus
                </button>
              </form>
            </td>
            <div id="editCategoryModal-{{ $category->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                  <!-- Modal header -->
                  <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Edit Kategori
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editCategoryModal-{{ $category->id }}">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="sr-only">Tutup modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <form action="{{ route('category.update', $category->id ) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-1">
                      <div>
                        <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
                        <input value="{{ $category->category_name }}" type="text" name="category_name" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                      </svg>
                      Ubah Data
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <tr>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function closeButton(event) {
      event.preventDefault();
      const alertDiv = event.target.closest('.alert');
      alertDiv.classList.add('invisible');
      alertDiv.remove();
    }
  </script>
</body>

@endsection