<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function view(Request $request){
        $books = Book::query()
                ->when($request->search, function($query, $search){
                    $query->where('title', 'like', '%' . $search . '%');
                });
        
        return view('books')->with(['books' => $books->paginate(5)->withQueryString()]);
    }

    public function create (BookRequest $request) {
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'published_date' => $request->published_date
        ]);

        return redirect('books');
    }

    public function update (Request $request) {
        $request->validate([
            'bookTitle' => ['required', 'string', 'max:255'],
            'bookAuthorId' => ['required', 'exists:authors,id'],
            'bookPublishedDate' => ['required', 'date'],
        ]);

        Book::where('id', $request->id)
        ->update([
            'title' => $request->bookTitle,
            'author_id' => $request->bookAuthorId,
            'published_date' => $request->bookPublishedDate,
        ]);

        return back();
    }

    public function delete($id){
        Book::where('id', $id)->delete();
        return redirect('books');
    }
}
