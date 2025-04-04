<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\Book;

class LibraryController extends Controller
{
    public function view (Request $request) {
      
    $libraries = Author::query()
                ->when($request->search, function($query, $search){
                    $query->where('authors.name', 'like', '%' . $search . '%')
                    ->orWhere('books.title', 'like', '%' . $search . '%');
                });

            return view('library')
            ->with([
                'libraries' => $libraries->select('authors.name as name','books.title as title', 'books.published_date as published_date')
                                ->join('books', 'authors.id', '=', 'books.author_id')
                                ->paginate(5)
                                ->withQueryString()
            ]);
    }
    
}
