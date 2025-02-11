@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-bold mb-5 text-black">All Books</h1>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($books as $book)
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure class="w-1/3">
                    <img src="{{ asset($book->image_path ?? 'images/default.jpg') }}"  alt="Book Cover" class="h-full object-cover"/>
                </figure>

                <div class="card-body w-2/3">
                    <h2 class="card-title text-2xl">{{ $book->title }}</h2>
                    <p><strong>Author:</strong> {{ $book->author_name }}</p>
                    <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
                    <p>
                        <strong>Availability:</strong> 
                        @if ($book->is_available)
                            <span class="text-green-500">Available</span>
                        @else
                            <span class="text-red-500">Not Available</span>
                        @endif
                    </p>
                    <div class="card-actions justify-end">
                        <a href="/books/{{ $book->id }}" class="btn btn-primary">More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
