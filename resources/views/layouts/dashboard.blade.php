@extends('layouts/master')

@section('title')
<title>Sandbox Puskeswan</title>
@endsection

@section('content')

<body>

  <x-top-nav :user_email="$userEmail" :username="$userName" />
  <x-sidebar/>

  <div class="sm:ml-64 pt-16 px-8">

  @if(Session::has('success_update_password'))
  <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
    <div class="flex items-start gap-4">
      <span class="text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </span>

      <div class="flex-1">
        <strong class="block font-medium text-gray-900">Update password berhasil</strong>

        <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_update_password') }}</p>
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

  @if(Session::has('success_update_profile'))
  <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
    <div class="flex items-start gap-4">
      <span class="text-green-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </span>

      <div class="flex-1">
        <strong class="block font-medium text-gray-900">Update profil berhasil</strong>

        <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_update_profile') }}</p>
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
    <h1 class="pt-8 mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">Dashboard</h1>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 md:gap-6 xl:grid-cols-4 2xl:gap-7.5 py-6 mx-">
      <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <!-- https://feathericons.dev/?search=file-text&iconset=feather -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-12 h-12 text-blue-800 dark:text-blue-900 mb-3 " fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
          <polyline points="14 2 14 8 20 8" />
          <line x1="16" x2="8" y1="13" y2="13" />
          <line x1="16" x2="8" y1="17" y2="17" />
          <polyline points="10 9 9 9 8 9" />
        </svg>
        <div class="flex flex-row w-full justify-between items-center">
          <h3 class="mb-2 text-2xl font-semibold tracking-tight text-gray-400 dark:text-white">
            Jumlah Artikel
          </h3>
          <h3 class="mb-2 text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
            {{ $articles }}
          </h3>
        </div>
      </div>
      <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <!-- https://feathericons.dev/?search=star&iconset=feather -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="w-12 h-12 text-blue-800 dark:text-blue-900 mb-3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
        </svg>

        <div class="flex flex-row w-full justify-between items-center">
          <h3 class="mb-2 text-2xl font-semibold tracking-tight text-gray-400 dark:text-white">
            Jumlah Review
          </h3>
          <h3 class="mb-2 text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
            {{ $reviews }}
          </h3>
        </div>
      </div>
      <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="w-12 h-12 text-blue-800 dark:text-blue-900 mb-3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <line x1="8" x2="21" y1="6" y2="6" />
          <line x1="8" x2="21" y1="12" y2="12" />
          <line x1="8" x2="21" y1="18" y2="18" />
          <line x1="3" x2="3.01" y1="6" y2="6" />
          <line x1="3" x2="3.01" y1="12" y2="12" />
          <line x1="3" x2="3.01" y1="18" y2="18" />
        </svg>

        <div class="flex flex-row w-full justify-between items-center">
          <h3 class="mb-2 text-2xl font-semibold tracking-tight text-gray-400 dark:text-white">
            Kategori Artikel
          </h3>
          <h3 class="mb-2 text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
            {{ $categories }}
          </h3>
        </div>
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