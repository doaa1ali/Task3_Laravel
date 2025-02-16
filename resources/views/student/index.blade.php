@extends('Layout.master')

@section('Show-Books')

    <div class="page-header">
        <h1>Students Table</h1>
        <div class="header-actions">
            <button class="create-btn">
                <a href="{{ route('student.create') }}">
                    <span class="fas fa-plus"></span> Create New Student
                </a>
            </button>
            <form action="{{route('student.search')}}" method="GET" class="search-container">
                <input type="text" name="query" id="searchInput" placeholder="Enter Student Name...">
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
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Action </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                                         
                        
                       
                                <td class="actions">
                                <a href="{{ route('student.show', $student->id) }}" class="show-btn">Show</a>
                                    <a href="{{ route('student.edit', $student->id) }}" class="edit-btn">Edit</a>
                                    <!-- Add this link -->
                                    <form action="{{ route('student.delete', $student->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                    </form>
                                </td>
                    </tr>
                @endforeach   
            </tbody>
        </table>
    </div>

@endsection
