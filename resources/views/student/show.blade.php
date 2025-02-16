@extends('Layout.master')

@section('Show-Books')
   

<main>
        <div class="container">
            <div class="show">
               
            </div>

            <div>
                <h3>{{ $student->name }}</h3>
                <span>{{ $student->email }}</span>
            </div><br>

            <div class="student-details">
                <h3>Phone:</h3>
                <span>{{ $student->phone }}</span>
            </div>

            <div class="student-books">
                <h3>Books Selected ({{ $student->books->count() }}):</h3>
                @if($student->books->isEmpty())
                    <p>No books selected by this student.</p>
                @else
                    <ul class="book-list">
                        @foreach($student->books as $book)
                            <li class="book-item">
                                <span class="book-title">{{ $book->name }}</span> 
                                <span class="book-price">${{ $book->price }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="buttons-container">
                <a href="{{ route('student.edit', $student->id) }}" class="save">Edit</a> 
                <a href="{{ route('student.index')}}" class="cancel">Back</a>
            </div>
        </div>
    </main>
@endsection