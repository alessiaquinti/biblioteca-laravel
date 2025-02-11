<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
});


Route::get('/books', function () {
    $books = DB::select('
        SELECT books.*, authors.name AS author_name, 
        CASE 
            WHEN books.id IN (SELECT book_id FROM loans WHERE return_date IS NULL) 
            THEN FALSE ELSE TRUE 
        END AS is_available
        FROM books
        JOIN authors ON books.author_id = authors.id
    ');
    return view('pages.bookList', ['books' => $books]);
});


Route::get('/books/{id}', function ($id) {
    $book = DB::select('
        SELECT books.*, authors.name AS author_name,
        CASE 
            WHEN books.id IN (SELECT book_id FROM loans WHERE return_date IS NULL) 
            THEN FALSE ELSE TRUE 
        END AS is_available
        FROM books
        JOIN authors ON books.author_id = authors.id
        WHERE books.id = ?
    ', [$id]);

    return view('pages.bookDetail', ['book' => $book[0]]);
});


Route::get('/authors', function () {
    $authors = DB::select('SELECT * FROM authors');
    return view('pages.authorList', ['authors' => $authors]);
});



Route::get('/loans', function () {
    $loans = DB::select('
        SELECT loans.*, books.title AS book_title, books.image_path, books.id AS book_id 
        FROM loans 
        JOIN books ON loans.book_id = books.id
        WHERE loans.return_date IS NULL
    ');

    return view('pages.loanList', ['loans' => $loans]);
});



