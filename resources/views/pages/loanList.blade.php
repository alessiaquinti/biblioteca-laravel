@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Loans</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($loans as $loan)
            <div class="card card-side bg-base-100 shadow-xl">
                <figure>
                <img src="{{ asset($loan->image_path ?? 'images/default.jpg') }}" alt="Book Cover" class="h-full object-cover w-32"/>
                </figure>

                <div class="card-body">
                    <h2 class="card-title">{{ $loan->book_title }}</h2>
                    
                    <p><strong>Loan Date:</strong> {{ $loan->loan_date }}</p>
                    <p><strong>Return Date:</strong> {{ $loan->return_date ?? 'Not yet returned' }}</p>
                    <p>
                        <strong>Status:</strong> 
                        @if ($loan->return_date)
                            <span class="text-green-500">Returned</span>
                        @else
                            <span class="text-red-500">On Loan</span>
                        @endif
                    </p>

                    <div class="card-actions justify-end">
                        <a href="/books/{{ $loan->book_id }}" class="btn btn-primary">More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
