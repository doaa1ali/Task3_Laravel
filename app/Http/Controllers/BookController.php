<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;


class BookController extends Controller
{
 
  public function index()
  {
    $books = Book::all(); 
    return view('book.index', compact('books'));
  }

  public function create()
  {
      $authors = Author::all(); 
      return view('book.create', compact('authors'));  
  }

  public function store(Request $request)
  {
    //dd("$request");
    //dd($request->all());

    $request->validate([

        "name" => "string|required",
        "descraption" => "string|required",
        "price" => "numeric| required" 
    ]);

    $filename = null;

    if($request->hasFile('image')){
      $image = $request->file('image');
      $extention = $image->extension();
      $filename = "Library" . time() . '.' . $extention;
      $image->move(public_path("uploads/book/images"), $filename);
    }

    $name = $request->name;
    $descraption = $request->descraption;
    $price = $request->price;
    $image = $filename;
    $author_id = $request->author_id;

    $date = [
      'name' => $name,
      'descraption' => $descraption,
      'price' => $price,
      'image' =>$image,
      'author_id' => $author_id
    ];
    
    Book::create($date);
    $books = Book::all();
    session()->flash('success', 'The book has been added successfully!');
    return view('book.index', compact('books'));
  }


  public function search(Request $request)
  {

    $query = $request->input('query');
    $books = Book::where('name', 'like', "%{$query}%")->get();
    return view('book.index', compact('books'));
    
  }

  public function edit(Book $book)
  {
    
      return view('book.edit', compact('book'));
  }

  public function update(Request $request, Book $book)
  {
      $data_update=([
          'name' => $request->name,
          'descraption' => $request->descraption,
          'image' => $request->image,
          'price' => $request->price
      ]);

      if($request->hasFile('image')){
        $image = $request->file('image');
        $extention = $image->extension();
        $filename = "Library" . time() . '.' . $extention;
        $image->move(public_path("uploads/book/images"), $filename);       
        $data_update['image'] = $filename;
      }


      $book->update($data_update);

      session()->flash('success', 'The book has been updated successfully!');
      return redirect()->route('book.index');
  }

  public function Delete(Book $book)
  {
      $book->delete();
      session()->flash('success', 'The book has been deleted successfully!');
      return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
  }

  public function show($id)
  {
    $book = Book::with('author')->findOrFail($id);
    return view('book.show', compact('book'));
  }


}
?>
