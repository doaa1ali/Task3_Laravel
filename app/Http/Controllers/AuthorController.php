<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all(); 
        return view('author.index', compact('authors'));
    }

    
    public function create()
    {
        $books = Book::all(); 
        return view('author.create', compact('books'));  
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "string|required",
            "email" => "email|required|unique:authors,email",
            "bio" => "string|required",
            "job_description" => "string|required",
            "profile_image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
    
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = "Library" . time() . '.' . $image->extension();
            $image->move(public_path("uploads/author/images"), $filename);
            $validatedData['profile_image'] = 'uploads/author/images/' . $filename;
        } else {
            $validatedData['profile_image'] = null; 
        }
    
        Author::create($validatedData);
    
        return redirect()->route('author.index')->with('success', 'The author has been added successfully!');
    }
    

    
    public function search(Request $request)
    {
  
      $query = $request->input('query');
      $authors = Author::where('name', 'like', "%{$query}%")->get();
      return view('author.index', compact('authors'));
      
    }
    
    public function edit(Author $author)
    {
      
        return view('author.edit', compact('author'));
    }
  
    public function update(Request $request, Author $author)
    {
       
        
        $data_update = ([
            'name' =>$request->name,
            'email' => $request->email,
            'profile_image' => $request->profile_image,
            'bio' =>$request->bio,
            'job_description' => $request->job_description,
            'book_id' => $request->book_id
        ]);

        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $extention = $image->extension();
            $filename = "Library" . time() . '.' . $extention;
            $image->move(public_path("uploads/author/images"), $filename);       
            $data_update['profile_image'] = $filename;
        }
        
        $author->update($data_update);

        session()->flash('success', 'The book has been updated successfully!');
        return redirect()->route('author.index');
    }

    
    public function destroy(Author $author)
    {
        $author->delete();
        session()->flash('success', 'The author has been deleted successfully!');
        return redirect()->route('author.index')->with('success', 'Author deleted successfully!');
    }

    public function show($id)
    {
        
        $author = Author::with('books')->find($id);
        if (!$author) {
            return redirect()->route('author.index')->with('error', 'Author not found!');
        }

        return view('author.show', compact('author'));
    }

}
