@extends('layout.master')

@section('Show-Books')
<main>
<di class="container">
    <h1>Edit Student</h1>
    <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required>
        </div>

       

      
            <button type="submit" class="save">Update Student</button>
            <button type="button" onclick="window.location.href='{{ route('student.index') }}';" class="cancel">Cancel</button>
        
    </form>
</div>
</main>
@endsection

