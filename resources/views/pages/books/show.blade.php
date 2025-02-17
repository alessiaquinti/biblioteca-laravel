@extends('layouts.app')

@section('content')
    <div class="card card-side bg-base-100 shadow-xl h-80">
        
            <img src="{{ asset($book->image_path ?? 'images/default.jpg') }}" class="h-full object-cover"/>
        

        <div class="card-body">
            <h2 class="card-title text-3xl">{{ $book->title }}</h2>
            <p><strong>Autore:</strong> {{ $book->author_name }}</p>
            <p><strong>Anno di pubblicazione:</strong> {{ $book->publication_year }}</p>
            <p>
                <strong>Disponibilita:</strong> 
                @if ($book->is_available)
                    <span class="text-green-500">Disponibile</span>
                @else
                    <span class="text-red-500">In prestito</span>
                @endif
            </p>

            <div class="card-actions justify-end mt-4">
                <a href="/books" class="btn bg-teal-400">Lista libri</a>
            </div>
        </div>
    </div>
@endsection

