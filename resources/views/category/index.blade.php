@extends('Layout.master')

@section('Show-Books')

    <div class="page-header">
        <h1>Category Table</h1>
        <div class="header-actions">
            <button class="create-btn">
                <a href="{{ route('category.create')}}">
                    <span class="fas fa-plus"></span> Create New Ctegory
                </a>
            </button>
            <form action="{{ route('category.search') }}" method="GET" class="search-container">
                <input type="text" name="query" id="searchInput" placeholder="Enter category Name...">
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="actions">

                            <a href="{{ route('category.show', $category->id) }}" class="show-btn">show</a>
                            <a href="{{ route('category.edit', $category->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('category.delete', $category->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
