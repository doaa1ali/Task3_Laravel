@extends('Layout.master')

@section('Show-Books')
    <main>
        <div class="container">
            <h1>Add New student</h1><br><br>

            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf 
                
                <label for="name">Name of student:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p style="color: red; font-size: 14px; text-align: left;">{{ $message }}</p>
                @enderror

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" >

                <label for="phone">Phone:</label>
                <input type="number" id="phone" name="phone" value="{{ old('phone') }}" >

               

               
                <!-- <label for="book_id"> Select Name of Book</label>
                <select id="book_id" name="book_id" required>
                    <option value="">-- Select Book --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select><br><br> -->

                <button type="submit" class="save">Save</button> 
                <button type="button" onclick="window.location.href='{{ route('student.index') }}';" class="cancel">Cancel</button>
            </form>
        </div>
    </main>
@endsection
