@extends('Layout.master')

@section('Show-Books')
    <main>
    
        <div class="container">
            <div class="show">
                <img src="{{ asset('uploads/book/images/' . $book->image) }}" >
            </div>

            <div>
                <h3>{{ $book->name }}</h3>
            </div><br>

            <div class="author-details">

                <h3>Description:</h3>
                <p class="bio">{{ $book->descraption }}</p>

                <h3>Price:</h3>
                <p class="bio">{{ $book->price }}</p>

                
                <h3>Author:</h3>
                @if(!$book->author)
                    <p>No author available for this book.</p>
                @else
                    <p>{{ $book->author->name }}</p>
                @endif

                <h3>Categories:</h3>
                @if($book->categories->isNotEmpty())
                    <ul>
                        @foreach($book->categories as $category)
                            <li class="list">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No Categories</p>
                @endif

            </div>

            <div class="buttons-container">
                <a href="{{ route('book.edit', $book->id) }}" class="save">Edit</a> 
                <a href="{{ route('book.index') }}" class="cancel">Back</a>
            </div>

        </div>
    </main>
@endsection
