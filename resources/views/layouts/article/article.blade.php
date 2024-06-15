@extends('layouts/master')

@section('title')
<title>Sandbox Puskeswan</title>
@endsection

@section('content')

<body>

  <x-top-nav :user_email="$userEmail" />
  <x-sidebar/>

  <div class="sm:ml-64 pt-16 px-8">
    @if(Session::has('success_store'))
    <div class="alert rounded-xl border border-gray-100 bg-white p-4 mb-4" role="alert">
      <div class="flex items-start gap-4">
        <span class="text-green-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>

        <div class="flex-1">
          <strong class="block font-medium text-gray-900">Proses berhasil</strong>

          <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_store') }}</p>
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

    @if(Session::has('success_delete'))
    <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4">
      <div class="flex items-start gap-4">
        <span class="text-green-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>

        <div class="flex-1">
          <strong class="block font-medium text-gray-900">Hapus data berhasil</strong>

          <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_delete') }}</p>
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

    @if(Session::has('failed_delete'))
    <div class="rounded border-s-4 border-red-500 bg-red-50 p-4">
      <div class="flex items-center gap-2 text-red-800">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
          <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
        </svg>

        <strong class="block font-medium"> Ada kesalahan </strong>
      </div>

      <p class="mt-2 text-sm text-red-700">
        {{ Session::get('failed_delete') }}
      </p>
    </div>
    @endif

    @if(Session::has('success_update'))
    <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
      <div class="flex items-start gap-4">
        <span class="text-green-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>

        <div class="flex-1">
          <strong class="block font-medium text-gray-900">Edit data berhasil</strong>

          <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_update') }}</p>
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

    <h1 class="mt-4 mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">Daftar Rekomendasi Artikel</h1>
    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3">
      <a href="{{ route('article.create') }}">
        <button type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
          </svg>
          Tambah Artikel
        </button>
      </a>
    </div>
    <div class="rounded-lg border border-gray-200 mt-6">
      <div class="overflow-x-auto rounded-t-lg">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
          <thead class="ltr:text-left rtl:text-right">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Judul</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Kategori</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Penulis</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal Terbit</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Aksi</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            @foreach($articles as $article)
            <tr>
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$article->title}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$article->category->category_name}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$article->author}}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ date('d F Y', strtotime($article->date)) }}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700f flex flex-row">
                <a class="mx-2 inline-block rounded border border-indigo-600 bg-indigo-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="{{ route('article.detail', $article->id)}}">
                  Lihat Detail
                </a>
                <a class="mx-2 inline-block rounded border border-green-600 bg-green-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600 focus:outline-none focus:ring active:text-green-500" href="{{ route('article.edit', $article->id) }}">
                  Edit
                </a>
                <form action="{{ route('article.delete', $article->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="mx-2 inline-block rounded border border-red-600 bg-red-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500" onclick="return confirm('Yakin ingin hapus artikel?')">
                    Hapus
                  </button>
                </form>
              </td>
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