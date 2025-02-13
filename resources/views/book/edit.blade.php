@extends('Layout.master')

@section('Show-Books')
    <main >
        <div class="container">
            <h1>Edit Book</h1><br><br>

            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT') 

                <label for="name">Name Of Book:</label>
                <input type="text" name="name" value="{{ $book->name }}" required>
                @error('name')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="descraption">Description:</label>
                <textarea name="descraption">{{ $book->descraption }}</textarea>
                @error('descraption')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="image">Image of Book:</label>
                <input type="file" id="image" name="image" value="{{ $book->image }}" >
                @error('image')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="price">Price:</label>
                <input type="number" name="price" value="{{ $book->price }}" required>
                @error('price')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                

                <button type="submit" class="save">Edit</button> 
                <button type="button" onclick="window.location.href='{{ route('book.index') }}';" class="cancel">Cancel</button>
            </form>
        </div>
    </main>
@endsection
