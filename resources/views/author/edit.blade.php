@extends('Layout.master')

@section('Show-Books')
    <main>
        <div class="container">
            <h1>Edit Author</h1><br><br>

            <form action="{{ route('author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $author->name }}" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $author->email }}" required>

                <label for="bio">Bio:</label>
                <textarea name="bio">{{ $author->bio }}</textarea>

                <label for="job_description">Job Description:</label>
                <input type="text" name="job_description" value="{{ $author->job_description }}">

                <label for="book_id">Book ID:</label>
                <input type="number" name="book_id" value="{{ $author->book_id }}" required>

                <label for="profile_image">Profile Image:</label><br>
                @if($author->profile_image)
                    <img src="{{ asset('uploads/author/images/' . $author->profile_image) }}" width="80" height="80" style="border-radius: 50%;">
                @else
                    <p>No Image</p>
                @endif
                <input type="file" name="profile_image">

                <br><br>
                <button type="submit" class="save">Edit</button> 
                <button type="button" onclick="window.location.href='{{ route('author.index') }}';" class="cancel">Cancel</button>
            </form>
        </div>
    </main>
@endsection
