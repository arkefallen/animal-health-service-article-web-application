@extends('layouts/master')

@section('title')
<title>Edit Artikel</title>
@endsection

@section('content')
<body>
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      @if(Session::has('failed_update_review'))
      <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4">
        <div class="flex items-start gap-4">
          <span class="text-green-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>

          <div class="flex-1">
            <strong class="block font-medium text-gray-900">Ada kesalahan</strong>

            <p class="mt-1 text-sm text-gray-700">{{ Session::get('failed_update_review') }}</p>
          </div>

          <button class="text-gray-500 transition hover:text-gray-600">
            <span class="sr-only">Tutup popup</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      @endif
      <a href="{{ route('review') }}">
        <button class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
          <svg class="-ml-1 mr-1.5 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
          </svg>
          Kembali
        </button>
      </a>
      <h2 class="mt-8 mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Data Review</h2>
      <form action="{{ route('review.update', $review->id ) }}" class="space-y-4" method="post">
        @csrf
        @method('PUT')
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengguna</label>
            <input disabled value="{{ $review->username }}" type="text" name="username" id="title" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik judul artikel">
          </div>
          <div class="w-full">
            <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Pelayanan</label>
            <input value="{{ $review->score }}" min="1" max="5" type="number" name="score" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
          <div class="w-full">
            <label for="checkup_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Pelayanan</label>
            <input disabled value="{{ $review->checkup_category }}" type="text" name="checkup_category" id="date" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
          </div>
          <div class="w-full">
            <label for="feedback_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <input disabled value="{{ $review->feedback_category }}" type="text" name="feedback_category" id="date" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
          </div>
          <div class="w-full">
            <label for="animal_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Hewan</label>
            <input disabled value="{{ $review->animal_category }}" type="text" name="animal_category" id="date" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
          </div>
          <div class="sm:col-span-2">
            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar</label>
            <textarea name="comment" id="content" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan konten artikel anda disini">{{ $review->comment }}</textarea>
          </div>
        </div>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
          Ubah Data
        </button>
      </form>
    </div>
  </section>
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