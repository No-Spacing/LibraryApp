<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::query()
        ->when($request->search, function($query, $search){
            $query->where('title', 'like', '%' . $search . '%');
        });

        return view('books')->with(['books' => $books->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'published_date' => $request->published_date
        ]);

        return redirect('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::where('id', $id)->delete();
        return redirect('books');
    }
}
