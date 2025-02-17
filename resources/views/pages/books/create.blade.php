@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Aggiungi un nuovo libro</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @include('partials.bookForm') 
@endsection
