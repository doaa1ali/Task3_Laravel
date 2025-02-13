<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    
 public function index()
    {
        $students = Student::with('books')->get(); 
        return view("student.index", compact("students"));
    }


    
    
    public function create()
    {
        $books = Book::all(); 
    
        return view("student.create", compact("books"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'phone' => 'required|numeric',
           // 'book_id' => 'required|exists:books,id',

        ]);

        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $date = [
            'name' => $name,
            'email' => $email,
            'phone'=> $phone
            ];
        

        /*Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
           // 'book_id' => $request->book_id,

 
        ]);*/
         Student::create($date);
        $students = Student::all();
        session()->flash('success', 'The student has been added successfully!');

        return redirect('student/index');
    }
    public function search(Request $request)
    {
  
      $query = $request->input('query');
      $students = Student::where('name', 'like', "%{$query}%")->get();
      return view('student.index', compact('students'));
      
    }



    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('books'); // Ensure books are loaded
        return view('student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $books = Book::all(); // Fetch all books for selection
        return view('student.edit', compact('student', 'books'));
    }

    public function update(Request $request, Student $student)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|numeric',
            'books' => 'nullable|array', // Optional array for book IDs
            'books.*' => 'exists:books,id' // Ensure each book ID exists
        ]);
    
        // Update student details
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    
        // Update book associations (one-to-many)
       /* if ($request->has('books')) {
            // Detach all previous books
            Book::where('student_id', $student->id)->update(['student_id' => null]);
    
            // Attach the new books
            Book::whereIn('id', $request->books)->update(['student_id' => $student->id]);
        } else {
            // If no books are provided, detach all
            Book::where('student_id', $student->id)->update(['student_id' => null]);
        }*/
    
        // Redirect back with success message
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }
    

    public function destroy(Student $student)
    {
        // Remove the relationship with the books by setting student_id to null
        $student->books()->update(['student_id' => null]);
    
        // Delete the student's image if it exists
      ////  if ($student->image) {
          //  Storage::disk('public')->delete($student->image);
        //}
    
        // Delete the student record
        $student->delete();
    
        session()->flash('success', 'Student and their book associations have been deleted successfully!');
        return redirect()->route('student.index');
    }
    
}
