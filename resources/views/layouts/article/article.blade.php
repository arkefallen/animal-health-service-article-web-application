@extends('layouts/master')

@section('title')
<title>Sandbox Puskeswan</title>
@endsection

@section('content')

<body>

  <x-top-nav :user_email="$userEmail" :username="$userName" />
  <x-sidebar />

  <div class="sm:ml-64 pt-16 px-8">
    <x-success-popup-notification :session_status="Session::has('success_store')" session_title="Proses tambah berhasil" :session_message="Session::get('success_store')" />
    <x-success-popup-notification :session_status="Session::has('success_delete')" session_title="Hapus data berhasil" :session_message="Session::get('success_delete')" />
    <x-failed-popup-notification :session_status="Session::has('failed_delete')" session_title="Gagal hapus data" :session_message="Session::get('failed_delete')" />
    <x-success-popup-notification :session_status="Session::has('success_update')" session_title="Ubah data berhasil" :session_message="Session::get('success_update')" />

    <h1 class="mt-4 mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">Daftar Rekomendasi Artikel</h1>
    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3">
      <a href="{{ route('article.create') }}">
        <button type="button" class="flex items-center justify-center text-white bg-blue-900 hover:bg-blue-950 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
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
            @if($article->category->category_name != null)
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
            @endif
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