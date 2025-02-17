@extends('layouts.app')

@section('content')
<div class="flex gap-x-8">
    <div class="w-1/2">
       <img src="src/home.svg"> 
    </div>
    <div class=" grid gap-y-6 w-1/2   ">
        @foreach([
            ['title' => 'Scopri tutti i libri', 'text' => 'VIsualizza tutti i libri disponibili nella biblioteca.', 'route' => 'book-list'],
            ['title' => 'Prestiti', 'text' => 'Controlla quali libri sono in prestito al momento.', 'route' => 'loans'],
            ['title' => 'Aggiungi un nuovo libro', 'text' => 'Aggiungi un nuovo libro alla biblioteca.', 'route' => 'create-book']
        ] as $card)
            <div class="card w-4/5 bg-white text-black mx-auto py-6">
                <div class="card-body">
                    <h2 class="card-title">{{ $card['title'] }}</h2>
                    <p>{{ $card['text'] }}</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route($card['route']) }}" class="btn bg-teal-400">Vai</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
