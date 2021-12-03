@extends('dashboard.dashboard')


@section('content')


<a href="{{ route('category-create') }}"><button type="button" class="btn btn-primary">Add Category</button></a>

<h2 class="mt-3">Categories</h2>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
            

     @foreach ($categories as $item)
         
  
      <tr>
        <th scope="row">1</th>
        <td>{{ $item->name }}</td>
        <td>Otto</td>

          <td>Otto</td>
      </tr>
      @endforeach

  
    </tbody>
  </table>

  @endsection