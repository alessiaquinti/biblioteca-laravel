<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/books', function () {
    $books = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.*', 'authors.name as author_name')
        ->orderBy('books.title')
        ->get();

    return view('pages.books.index', ['books' => $books]);
})->name('book-list');

Route::get('/books/{id}', function ($id) {
    $book = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.*', 'authors.name as author_name')
        ->where('books.id', $id)
        ->first();

    return view('pages.books.show', ['book' => $book]);
});

Route::get('/loans', function () {
    $loans = DB::table('loans')
        ->join('books', 'loans.book_id', '=', 'books.id')
        ->select('loans.*', 'books.title as book_title', 'books.image_path', 'books.id as book_id')
        ->whereNull('loans.return_date') 
        ->get();

    return view('pages.loanList', ['loans' => $loans]);
})->name('loans');

Route::get('/create', function () {
    $authors = DB::table('authors')->get();
    return view('pages.books.create', ['authors' => $authors]);
})->name('create-form');


Route::post('/create', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author_name' => 'required|string|max:255',
        'publication_year' => 'required|integer|min:1000|max:2099',
    ]);

    $author = DB::table('authors')
        ->where('name', $validated['author_name'])
        ->first();

    if (!$author) {
        DB::table('authors')->insert([
            'name' => $validated['author_name']
        ]);

        $author = DB::table('authors')
            ->where('name', $validated['author_name'])
            ->first();
    }

    DB::table('books')->insert([
        'title' => $validated['title'],
        'author_id' => $author->id,
        'publication_year' => $validated['publication_year'],
        'image_path' => $request->image_path ?? 'src/default.jpg'
    ]);

    return redirect()->route('create-form')->with('success', 'Libro aggiunto con successo!');
})->name('create-book');

Route::get('/authors', function () {
    $authors = DB::table('authors')
        ->select('authors.*', DB::raw('COUNT(books.id) as books_count'))
        ->leftJoin('books', 'authors.id', '=', 'books.author_id')
        ->groupBy('authors.id')
        ->get();

    return view('pages.authorList', ['authors' => $authors]);
});

