@extends('master')

@section('title')
    <title>Detail Artikel</title>
@endsection

@section('content')
    <body>
        <div class="flex justify-center pt-12">
            <div class="basis-3/4">
                <a
                class="inline-block rounded-full border border-indigo-600 p-3 text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500"
                href="{{ route('index') }}"
                >

                <svg class="text-indigo-600 fill-current hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                </a>
                <h1 class="text-5xl font-bold mt-4">
                    {{ $article->title }} 
                </h1>
                <div class="flex items-center py-8">
                    <p class="mr-4 text-xl text-slate-600">{{ $article->author }}</p>
                    <span class="mr-4 whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-sm text-purple-700">{{ date('d F Y', strtotime($article->date)) }}</span>
                    <span class="whitespace-nowrap rounded-full bg-emerald-100 px-2.5 py-0.5 text-sm text-emerald-700">{{ $article->category }}</span>
                </div>
                <p class="py-4 text-2xl text-slate-800">{{ $article->content }}</p>
            </div>
        </div>
    </body>
@endsection