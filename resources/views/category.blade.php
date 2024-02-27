@extends('master')

@section('title')
<title>Tambah Kategori</title>
@endsection

@section('content')

<body class="bg-gray-100">
  <section class="justify-center h-screen flex items-center ">
    <div class="rounded-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 sm:basis-11/12 md:basis-4/5 lg:basis-3/4">
      <div class="rounded-lg bg-white p-8 shadow-lg">
        @if(Session::has('failed_store'))
        <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4">
          <div class="flex items-start gap-4">
            <span class="text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>

            <div class="flex-1">
              <strong class="block font-medium text-gray-900">Ada kesalahan</strong>

              <p class="mt-1 text-sm text-gray-700">{{ Session::get('failed_store') }}</p>
            </div>

            <button class="text-gray-500 transition hover:text-gray-600">
              <span class="sr-only">Dismiss popup</span>

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        @endif

        @if(Session::has('success_create_category'))
        <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
          <div class="flex items-start gap-4">
            <span class="text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>

            <div class="flex-1">
              <strong class="block font-medium text-gray-900">Tambah data berhasil</strong>

              <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_create_category') }}</p>
            </div>

            <button class="text-gray-500 transition hover:text-gray-600 dismiss-btn" onclick="closeButton(event)">
              <span class="sr-only">Dismiss popup</span>

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        @endif

        @if(Session::has('success_delete_category'))
        <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
          <div class="flex items-start gap-4">
            <span class="text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>

            <div class="flex-1">
              <strong class="block font-medium text-gray-900">Hapus data berhasil</strong>

              <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_delete_category') }}</p>
            </div>

            <button class="text-gray-500 transition hover:text-gray-600 dismiss-btn" onclick="closeButton(event)">
              <span class="sr-only">Dismiss popup</span>

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        @endif

        <h1 class="text-2xl font-bold">Daftar Kategori Artikel Saat Ini</h1>
        <div class="flex flex-row my-4">
          @foreach($categories as $category)
          <span class="category-badge mr-4 inline-flex items-center justify-center rounded-full bg-purple-100 hover:bg-purple-500 px-2.5 py-0.5 text-purple-700 hover:text-white hover:cursor-pointer">

            <p class="whitespace-nowrap text-sm category-name">{{ $category->category_name }}</p>

            <form action="{{ route('category.destroy', $category->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="-me-1 ms-1.5 inline-block rounded-full bg-purple-200 p-0.5 text-purple-700 transition hover:bg-purple-300" onclick="return confirm('Anda yakin ingin menghapus kategori ini?')">
                <span class="sr-only">Remove badge</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </form>
          </span>
          @endforeach
        </div>
        <h2 class="text-lg font-bold category-title">Tambah Kategori</h2>
        <form action="{{ route('category.store') }}" class="space-y-4 flex flex-col md:flex-row" method="post">
          @csrf
          <div class="basis-1 md:basis-3/4 mr-4">
            <label class="sr-only" for="name">Nama Kategori</label>
            <input class="w-full rounded-lg border border-gray-200 p-3 text-sm category-input" placeholder="Nama Kategori" type="text" name="category_name" />
          </div>

          <div class="basis-1 md:basis-1/4">
            <button type="submit" class="category-btn basis-1/4 inline-block w-full rounded-lg bg-blue-500 px-5 py-3 font-medium text-white">
              Tambah
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
<script>
  function closeButton(event) {
    event.preventDefault();
    const alertDiv = event.target.closest('.alert');
    alertDiv.classList.add('invisible');
    alertDiv.remove();
  }
</script>
@endsection