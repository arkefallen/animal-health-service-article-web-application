@extends('layouts/master')

@section('title')
<title>Daftar Review Pelayanan</title>
@endsection

@section('content')

<body>
    <x-top-nav :user_email="$userEmail" />
    <x-sidebar />
    <div class="sm:ml-64 pt-16 px-8">
        @if(Session::has('success_update_review'))
        <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
            <div class="flex items-start gap-4">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900">Edit review berhasil</strong>

                    <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_update_review') }}</p>
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
        @if(Session::has('success_delete_review'))
        <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
            <div class="flex items-start gap-4">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900">Hapus review berhasil</strong>

                    <p class="mt-1 text-sm text-gray-700">{{ Session::get('success_delete_review') }}</p>
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
        @if(Session::has('failed_delete_review'))
        <div class="rounded-xl border border-gray-100 bg-white p-4 alert mb-4" role="alert">
            <div class="flex items-start gap-4">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900">Hapus review gagal</strong>

                    <p class="mt-1 text-sm text-gray-700">{{ Session::get('failed_delete_review') }}</p>
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
        <h1 class="mt-4 mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl">Daftar Review Pelayanan</h1>
        <div class="rounded-lg border border-gray-200 mt-6">
            <div class="overflow-x-auto rounded-t-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Pengguna</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nilai Pelayanan</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jenis Pelayanan</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Kategori</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jenis Hewan</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach($feedbacks as $feedback)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$feedback->username}}</td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 flex flex-row ">
                                @for($i = 0; $i < $feedback->score; $i++)
                                    <svg class="w-6 h-6 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                    @endfor
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                @if($feedback->checkup_category == 'Reguler')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">{{$feedback->checkup_category}}</span>
                                @else
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300">{{$feedback->checkup_category}}</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$feedback->feedback_category}}</td>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$feedback->animal_category}}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700f flex flex-row">
                                <a class="mx-2 inline-block rounded border border-indigo-600 bg-indigo-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" href="{{ route('review.detail', $feedback->id)}}">
                                    Lihat Detail
                                </a>
                                <a class="mx-2 inline-block rounded border border-green-600 bg-green-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600 focus:outline-none focus:ring active:text-green-500" href="{{ route('review.edit', $feedback->id)}}">
                                    Edit
                                </a>
                                <form action="{{ route('review.destroy', $feedback->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mx-2 inline-block rounded border border-red-600 bg-red-600 px-5 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500" onclick="return confirm('Yakin ingin hapus review?')">                                        Hapus
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