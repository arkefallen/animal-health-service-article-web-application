@extends('master')

@section('title')
  <title>Artikel Puskeswan</title>
@endsection

@section('content')
<body class="p-8">
@if(Session::has('success_store'))
    <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4">
    <div class="flex items-start gap-4">
      <span class="text-green-600">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="h-6 w-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </span>

      <div class="flex-1">
        <strong class="block font-medium text-gray-900">Proses berhasil</strong>

        <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_store') }}</p>
      </div>

      <button id="dismiss-btn" class="text-gray-500 transition hover:text-gray-600" onclick="closeButton()">
        <span class="sr-only">Dismiss popup</span>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="h-6 w-6"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  @endif
<h1 class="text-4xl font-serif italic text-center pb-2 text-blue-950">Artikel Puskeswan</h1>
<p class="text-center text-xl font-sans text-slate-400 pt-2 pb-6">Kumpulan artikel yang digunakan pada aplikasi Puskeswan untuk memberikan rekomendasi bacaan kepada pasien</p>
<div class="flex items-center">
<a
    class="mx-auto group inline-block rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:outline-none focus:ring active:text-opacity-75"
    href="{{ route('create') }}"
  >
    <span
      class="block rounded-full bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent"
    >
      Tambah Artikel
    </span>
  </a>
</div>

<div class="pt-8 overflow-x-auto bg-white grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6">
  @foreach ($articles as $article)
  <article
    class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s] flex"
  >
    <div class="rounded-[10px] bg-white p-4 sm:p-6 flex-1">
      <time datetime="2022-10-10" class="block text-xs text-gray-500">{{ date('d F Y', strtotime($article->date)) }}</time>

      <a href="{{ route('article.detail', $article->id) }}">
        <h3 class="mt-0.5 text-lg font-medium text-gray-900">
          {{ $article->title }}
        </h3>
      </a>

      <div class="mt-4 flex flex-wrap gap-1">
        <span
          class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600"
        >
          {{ $article->category }}
        </span>
      </div>
    </div>
  </article>
  @endforeach

</div>
<script>
    function closeButton() {
      const dismissButton = document.getElementById('dismiss-btn');
      const alertDiv = document.getElementById('alert');

      dismissButton.addEventListener('click', function() {
        alertDiv.style.display = 'none';
      });
    }
  </script>
</body>
@endsection