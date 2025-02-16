@extends('Layout.master')

@section('Show-Books')
    <main>
        <div class="container">
            <h1>Add New Category</h1><br><br>

            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="name">Name of Category:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="description">Description:</label>
                <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="books">select books:</label>
                <select name="books[]" id="books" multiple>
                    @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select><br><br>
                @error('books')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror
                
                <button type="submit" class="save">Save</button>
                <button type="button" onclick="window.location.href='{{ route('category.index') }}';" class="cancel">Cancel</button>
            </form>
        </div>
    </main>
@endsection
