<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Category;
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
      $students = Student::all(); 
      return view('book.create', compact('authors','students'));  
  }

  public function store(Request $request)
  {
    //dd("$request");
    //dd($request->all());

    $request->validate([

        "name" => "string|required",
        "descraption" => "string|required",
        "price" => "numeric| required" ,
        'student_id' => 'exists:students,id',
    ]);

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
    $student_id = $request->student_id;

    $date = [
      'name' => $name,
      'descraption' => $descraption,
      'price' => $price,
      'image' =>$image,
      'author_id' => $author_id,
      'student_id' => $student_id
    ];
    
    Book::create($date);
    $books = Book::all();
    $authors  = Author::all();
    $students = Student::all();
    session()->flash('success', 'The book has been added successfully!');
    return view('book.index', compact('books','authors', 'students'));
  }


  public function search(Request $request)
  {

    $query = $request->input('query');
    $books = Book::where('name', 'like', "%{$query}%")->get();
    return view('book.index', compact('books'));
    
  }


  public function edit($id)
  {
    $book = Book::with('categories')->findOrFail($id);
    $categories = Category::all(); 
    $students = Student::all();  
    return view('book.edit', compact('book', 'categories', 'students'));
  }
  
  public function update(Request $request, $id)
  {
      $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|array', 
        'category_id.*' => 'exists:categories,id',  
        'student_id' => 'required|exists:students,id',  
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]);
    
        $book = Book::findOrFail($id);
    
    
      $data_update = [
              'name' => $request->name,
              'description' => $request->description,
              'price' => $request->price, 
              'student_id' => $request->student_id,  
          ];
    
        if ($request->hasFile('image')) {
          
            if ($book->image && file_exists(public_path("uploads/book/images/{$book->image}"))) {
                unlink(public_path("uploads/book/images/{$book->image}"));
            }
    
            $image = $request->file('image');
            $filename = "Library_" . time() . '.' . $image->extension();
            $image->move(public_path("uploads/book/images"), $filename);
    
            $data_update['image'] = $filename;
        }
    
        $book->update($data_update);

        $book->categories()->sync($request->category_id);

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
    $book = Book::with('author','student','categories' )->findOrFail($id);
    
    return view('book.show', compact('book'));
  }


}
?>
