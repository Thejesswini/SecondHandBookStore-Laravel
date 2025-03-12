<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function deleteEntry(Book $book){
        $book->delete();

        return redirect('/');
    }

    public function updateEntry(Book $book, Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);

        $book->update($incomingFields);
        return redirect('/');
    }

    public function loadEditScreen(Book $book){
        return view('edit-entry', ['book'=>$book]);
    }

    public function upload(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['user_id'] = auth()->id();

        Book::create($incomingFields);
        return redirect('/');
    }

    public function allBooks()
    {
        $books = Book::all();
        return view('newpg', ['allBooks' => $books, 'viewType' => 'all']);
    }

    public function myBooks()
    {
        $books = auth()->user()->usersBooks()->latest()->get();
        return view('newpg', ['allBooks' => $books, 'viewType' => 'mine']);
    }
}
