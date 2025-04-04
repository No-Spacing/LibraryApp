<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use \Validator;

use App\Models\Author;

class AuthorController extends Controller
{
    
    public function view(Request $request){
        $authors = Author::query()
                    ->when($request->search, function($query, $search){
                        $query->where('name', 'like', '%' . $search . '%');
                    });

        return view('authors')
        ->with([
            'authors' => $authors->paginate(5)->withQueryString()
        ]);
    }

    public function create (AuthorRequest $request) {   
        Author::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
        ]);

        return redirect('authors');
    }   

    public function update(Request $request){
        $request->validate([
            'authorName' => [ 'required', 'string', 'max:255' ],
            'authorBdate' => [ 'required', 'date' ],
        ]);

        Author::where('id', $request->id)
        ->update([
            'name' => $request->authorName,
            'birth_date' => $request->authorBdate,
        ]);

        return back();
    }

    public function delete($id){
        Author::where('id', $id)->delete();
        return redirect('authors');
    }
}
