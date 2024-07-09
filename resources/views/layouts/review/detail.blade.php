@extends('layouts/master')

@section('title')
<title>Detail Review</title>
@endsection

@section('content')

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <a href="{{ route('review') }}">
                <button class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                    <svg class="-ml-1 mr-1.5 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    Kembali
                </button>
            </a>
            <div class="mt-8 inline-flex space-x-2 ">
                <svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />
                </svg>
                <p>{{$review->username}}</p>
            </div>
            <h2 class="mt-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">Nilai Pelayanan</h2>
            <div class="flex flex-row mt-4 mb-8">
                @for($i = 0; $i < $review->score; $i++)
                    <svg class="w-12 h-12 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                    @endfor
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 py-4">
                <div>
                    <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis Pelayanan</p>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $review->checkup_category }}</p>
                </div>
                <div>
                    <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kategori</p>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $review->feedback_category }}</p>
                </div>
                <div>
                    <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis Hewan</p>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $review->animal_category }}</p>
                </div>
            </div>
            <div>
                <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Komentar</p>
                <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $review->comment }}</p>
            </div>
        </div>
    </section>
</body>
@endsection