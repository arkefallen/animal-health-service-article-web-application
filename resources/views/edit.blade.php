@extends('master')

@section('title')
  <title>Edit Artikel</title>
@endsection

@section('content')
<body class="bg-gray-100">
  <section class="justify-center h-screen flex items-center">
    <div class="rounded-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 sm:basis-11/12 md:basis-4/5 lg:basis-3/4">
    <div class="rounded-lg bg-white p-8 shadow-lg">
    @if(Session::has('failed_update'))
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
        <strong class="block font-medium text-gray-900">Ada kesalahan</strong>

        <p class="mt-1 text-sm text-gray-700">{{ Session::get('failed_update') }}</p>
      </div>

      <button class="text-gray-500 transition hover:text-gray-600">
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
      <h1 class="text-2xl mb-4 font-bold">Edit Artikel</h1>
        <form action="{{ route('article.update', $article->id ) }}" class="space-y-4" method="post">
          @csrf
          @method('PUT')
          <div>
            <label class="sr-only" for="name">Judul</label>
            <input
              class="w-full rounded-lg border border-gray-200 p-3 text-sm"
              placeholder="Judul Artikel"
              type="text"
              name="title"
              value="{{ $article->title }}"
            />
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label class="sr-only" for="email">Kategori</label>
              <input
                class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                placeholder="Kategori"
                type="text"
                name="category"
                value="{{ $article->category }}"
              />
            </div>

            <div>
              <label class="sr-only" for="phone">Tanggal Terbit</label>
              <input
                class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                placeholder="Phone Number"
                type="date"
                name="date"
                value="{{ $article->date }}"
              />
            </div>
          </div>
          
          <div>
            <label class="sr-only" for="name">Penulis</label>
            <input
              class="w-full rounded-lg border border-gray-200 p-3 text-sm"
              placeholder="Penulis"
              type="text"
              name="author"
              value="{{ $article->author }}"
            />
          </div>

          <div>
            <label class="sr-only" for="message">Isi Artikel</label>

            <textarea
              class="w-full rounded-lg border border-gray-200 p-3 text-sm overflow-scroll resize-none"
              placeholder="Isi Artikel"
              rows="8"
              name="content"
            >
                {{ $article->content }}
            </textarea>
          </div>

          <div class="mt-4">
            <button
              type="submit"
              class="inline-block w-full rounded-lg bg-blue-500 px-5 py-3 font-medium text-white"
            >
              Ubah Data
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
@endsection