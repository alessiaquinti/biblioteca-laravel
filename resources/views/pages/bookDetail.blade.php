@extends('layout.app')

@section('content')
    <div class="card card-side bg-base-100 shadow-xl h-80">
        <figure>
            <img src="{{ asset($book->image_path ?? 'images/default.jpg') }}" alt="Book Cover" class="h-full object-cover"/>
        </figure>

        <div class="card-body">
            <h2 class="card-title text-3xl">{{ $book->title }}</h2>
            <p><strong>Author:</strong> {{ $book->author_name }}</p>
            <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
            <p>
                <strong>Availability:</strong> 
                @if ($book->is_available)
                    <span class="text-green-500">Available</span>
                @else
                    <span class="text-red-500">Currently on loan</span>
                @endif
            </p>

            <div class="card-actions justify-end mt-4">
                <a href="/books" class="btn btn-primary">Back to books</a>
            </div>
        </div>
    </div>
@endsection

