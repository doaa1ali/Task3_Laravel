@extends('Layout.master')

@section('Show-Books')
    <main>
        <div class="container">
            <h1>Add New Book</h1><br><br>

            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf 
                
                <label for="name">Name of Book:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="descraption">Description:</label>
                <textarea id="descraption" name="descraption" required>{{ old('descraption') }}</textarea>
                @error('descraption')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="image">Image of Book:</label>
                <input type="file" id="image" name="image" value="{{ old('image') }}" >
                
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="author_id"> Select Name of Author</label>
                <select id="author_id" name="author_id" required>
                    <option value="">-- Select Author --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select><br><br>

                <button type="submit" class="save">Save</button> 
                <button type="button" onclick="window.location.href='{{ route('book.index') }}';" class="cancel">Cancel</button>
            </form>
        </div>
    </main>
@endsection



