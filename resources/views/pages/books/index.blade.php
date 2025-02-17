@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-5 text-black">Tutti i libri</h1>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($books as $book)
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure class="w-1/3">
                    <img src="{{ asset($book->image_path ?? 'images/default.jpg') }}" class="h-full object-cover"/>
                </figure>

                <div class="card-body w-2/3">
                    <h2 class="card-title text-2xl">{{ $book->title }}</h2>
                    <p><strong>Autore:</strong> {{ $book->author_name }}</p>
                    <p><strong>Anno Di Pubblicazione:</strong> {{ $book->publication_year }}</p>
                    <p>
                        <strong>Disponibilità:</strong> 
                        @if ($book->is_available)
                            <span class="text-green-500">Disponibile</span>
                        @else
                            <span class="text-red-500">Non disponibile</span>
                        @endif
                    </p>
                    <div class="card-actions justify-end">
                        <a href="/books/{{ $book->id }}" class="btn  bg-teal-400">Scopri</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
