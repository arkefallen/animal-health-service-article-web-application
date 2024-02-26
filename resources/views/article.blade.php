@extends('master')

@section('title')
<title>Artikel Puskeswan</title>
@endsection

@section('content')

<body class="p-8">
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
  


  <h1 class="text-4xl font-serif italic text-center pb-2 text-blue-950">Artikel Puskeswan</h1>
  <p class="text-center text-xl font-sans text-slate-400 pt-2 pb-6">Kumpulan artikel yang digunakan pada aplikasi Puskeswan untuk memberikan rekomendasi bacaan kepada pasien</p>
  <div class="flex items-center">
    <a class="mx-auto group inline-block rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:outline-none focus:ring active:text-opacity-75" href="{{ route('create') }}">
      <span class="block rounded-full bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent">
        Tambah Artikel
      </span>
    </a>
  </div>

  <div class="pt-8 overflow-x-auto bg-white grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6">
    @foreach ($articles as $article)
    <article class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s] flex">
      <div class="rounded-[10px] bg-white p-4 sm:p-6 flex-1">
        <time datetime="2022-10-10" class="block text-xs text-gray-500">{{ date('d F Y', strtotime($article->date)) }}</time>

        <a href="{{ route('article.detail', $article->id) }}">
          <h3 class="mt-0.5 text-lg font-medium text-gray-900 hover:text-blue-500">
            {{ $article->title }}
          </h3>
        </a>

        <div class="mt-3 flex flex-wrap gap-1">
          <span class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-xs text-purple-600">
            {{ $article->category }}
          </span>
        </div>

        <div class="flex flex-row-reverse mt-3">
          <form action="{{ route('article.delete', $article->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="mx-2 inline-block rounded-full border border-red-600 p-1 text-red-600 hover:bg-red-600 hover:text-white focus:outline-none focus:ring active:bg-red-500" onclick="return confirm('Yakin ingin hapus artikel?')">
              <svg class="text-red-600 fill-current hover:text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path d="M15 2H9c-1.103 0-2 .897-2 2v2H3v2h2v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h2V6h-4V4c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm8 16H7V8h10v12z"></path>
              </svg>
            </button>
          </form>

          <a class="mx-2 inline-block rounded-full border border-green-600 p-1 text-green-600 hover:bg-green-600 hover:text-white focus:outline-none focus:ring active:bg-green-500" href="{{ route('article.edit', $article->id) }}">
            <svg class="text-green-600 fill-current hover:text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
            </svg>
          </a>
        </div>
      </div>
    </article>
    @endforeach
  </div>

  <script>
    function closeButton(event) {
      event.preventDefault();
      const alertDiv = event.target.closest('.alert');
      alertDiv.classList.add('invisible');
    }
  </script>
  
</body>
@endsection