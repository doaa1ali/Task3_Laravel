@extends('Layout.master')

@section('Show-Books')
    <main>

        <div class="container">
            <div class="show">

            <h3>{{ $categories->name }}</h3>
            <span>{{ $categories->description }}</span>

            </div><br>
            <h3 style="text-align:left">Books related to this category </h3><br>
            @foreach($categories->books as $book)
            <div class="cat-details">

                <div >
              <img src="{{ asset('uploads/book/images/' . $book->image) }}" >
              </div>
            <div class="desc">
                <h4>$ {{$book->name}}</h4>
                <h6> {{$book->descraption}}</h6>
                <h4>$ {{$book->price}}</h4>
                             </div><br>
            </div>
            @endforeach


            <div class="buttons-container">
                <a href="{{ route('category.edit', $categories->id) }}" class="save">Edit</a>
                <a href="{{ route('category.index') }}" class="cancel">Back</a>
            </div>

        </div>
    </main>
@endsection
