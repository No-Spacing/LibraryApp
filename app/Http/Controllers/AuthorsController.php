<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;


class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::query()->when($request->search, function($query, $search){
                        $query->where('name', 'like', '%' . $search . '%');
                    });

        return AuthorResource::collection($authors->paginate(5));

        // return view('authors')
        // ->with([
        //     'authors' => AuthorResource::collection($authors->paginate(5)),
        // ]);
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
    public function store(AuthorRequest $request)
    {
        Author::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
        ]);

        return redirect('authors');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Author::where('id', $id)->delete();
        return redirect()->route('authors.index');
    }
}
