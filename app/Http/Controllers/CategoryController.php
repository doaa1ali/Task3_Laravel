<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
       // dd( $categories);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books=Book::get();
        return view('category.create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[^\d]+$/',
            'description' => 'string',
            'books' => 'array',
            'books.*' => 'exists:books,id'
        ]);

        $data=[
            'name' => $request->name,
            'description' => $request->description
        ];
        $category= Category::create($data);

        if ($request->has('books')) {
            $category->books()->attach($request->books);
        }

        session()->flash('success', 'The category has been added successfully!');
        $categories=Category::get();

        return view('category.index',compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::findOrFail($id);
        //dd($category);
        return view('category.show',compact('categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        $books=Book::get();
        //dd($category);
        return view('category.edit',compact('category','books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[^\d]+$/',
            'description' => 'string',
            'books' => 'array',
            'books.*' => 'exists:books,id'
        ]);

        $data=[
            'name' => $request->name,
            'description' => $request->description
        ];
        $category= Category::where('id',$request->id)->update($data);

        if ($request->has('books')) {
            $category->books()->attach($request->books);
        }

        session()->flash('success', 'The category has been updated successfully!');

        $categories=Category::get();
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        session()->flash('success', 'The category has been deleted successfully!');
        $categories=Category::get();
        return redirect()->route('category.index')->with('success', 'category deleted successfully!');

    }

    public function search(Request $request)
    {

      $query = $request->input('query');
      $categories = Category::where('name', 'like', "%{$query}%")->get();
      return view('category.index', compact('categories'));
    }

}
