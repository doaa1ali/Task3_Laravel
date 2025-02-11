@extends('Layout.master')

@section('Show-Books')
    <main >
        <div class="container">
            <h1>Edit Book</h1><br><br>

            <form action="{{ route('book.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <label for="name">Name Of Book:</label>
                <input type="text" name="name" value="{{ $book->name }}" required>

                <label for="descraption">Description:</label>
                <textarea name="descraption">{{ $book->descraption }}</textarea>

                <label for="price">Price:</label>
                <input type="number" name="price" value="{{ $book->price }}" required>
                

                <button type="submit" class="save">Edit</button> 
                <button type="button" onclick="window.location.href='{{ route('book.index') }}';" class="cancel">Cancel</button>
            </form>
        </div>
    </main>
@endsection
