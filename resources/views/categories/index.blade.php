@extends('dashboard.dashboard')
@section('content')
<a href="{{ route('categories.create') }}"><button type="button" class="btn btn-primary">Add Category</button></a>
<h2 class="mt-3">Categories</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col text-center">Category</th>
      <th scope="col text-center">Product counts</th>
      <th scope="col aligntext-right">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category->name}}</td>
      <td>{{ $category->product()->count() ?? 0 }}</td>
      <td>
        <button class="btn btn-light">Edit</button>
        <form action="{{ route('categories.destroy' ,  $category->id)}}" method="POST"
          class="d-inline"
          onsubmit="return confirm('are you sure you want to delete {{$category->name}} ? ') ">
          @csrf
          @method('delete')
          <button class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
