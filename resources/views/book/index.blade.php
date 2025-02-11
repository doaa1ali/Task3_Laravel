@extends('Layout.master')

@section('Show-Books')

    <div class="page-header">
        <h1>Books Table</h1>
        <div class="header-actions">
            <button class="create-btn">
                <a href="{{ route('book.create') }}">
                    <span class="fas fa-plus"></span> Create New Book
                </a>
            </button>
            <form action="{{ route('book.search') }}" method="GET" class="search-container">
                <input type="text" name="query" id="searchInput" placeholder="Enter Book Name...">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>  
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th> Name </th>
                    <th>Description</th>
                    <th>Image of Book </th>
                    <th>Price</th>
                    <th>Author_Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->descraption }}</td>
                        <td>
                        @if($book->image)
                            <img src="{{ asset('uploads/book/images/' . $book->image) }}"  width="80" height="80" style="border-radius: 50%; ">
                        @else                   
                            <p>No Image</p>
                        @endif
                        </td>
                        <td>${{ number_format($book->price, 2) }}</td>
                        <td>{{ $book->author_id }}</td>
                        <td class="actions">
                            <a href="{{ route('book.edit', $book->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('book.Delete', $book->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>    
                        </td>
                    </tr>
                @endforeach   
            </tbody>
        </table>
    </div>

@endsection
