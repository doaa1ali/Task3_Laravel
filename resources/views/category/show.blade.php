@extends('Layout.master')

@section('Show-Books')
    <main>

        <div class="container">
            <div class="show">

            <h3>{{ $categories->name }}</h3>
            <span>{{ $categories->description }}</span>

            </div><br>
            <h3 style="text-align:left">Books related to this category </h3><br>
            @foreach($categories->books as $book)
                <div class="book-container">
                    <div class="book-image">
                        <img src="{{ asset('uploads/book/images/' . $book->image) }}" alt="Book Image">
                    </div>
                    <div class="book-details">
                        <h4>Name of Book:</h4> <span>{{ $book->name }}</span><br>

                        <h4>Author:</h4> <span>{{ $book->author->name }}</span><br>

                        <h4>Description:</h4> <span>{{ $book->descraption }}</span><br>

                        <h4>Price:</h4> <span>${{ $book->price }}</span><br>
                    </div>

                </div>
            @endforeach

            <div class="buttons-container">
                <a href="{{ route('category.edit', $categories->id) }}" class="save">Edit</a>
                <a href="{{ route('category.index') }}" class="cancel">Back</a>
            </div>

        </div>
    </main>
@endsection
