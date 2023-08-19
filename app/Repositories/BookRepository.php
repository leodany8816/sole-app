<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function getBooksRatings(){
        $books = Book::orderBy('id', 'desc')->get();
        $count = 0;
        foreach ($books as $book) {
            $lista = $books[$count]->ratings = $book->users()->select('userables.*')->get();
            $count++;
        }

        $data = [
            'books' => $books,
        ];
        //print_r($books);
        return $data;
        //return $books;
    }

    public function getBookNotes($book_id){
        $book = Book::findOrFail($book_id);
        $data = [
            'book' => $book,
            'notes' => $book->note()->where('user_id', '=', auth()->user()->id)->get()
        ];
        return $data;
    }

    public function getBooks(){
        $books = Book::orderBy('id', 'desc')->get();
        $data = [
            'books' => $books
        ];
        return $data;
    }
}