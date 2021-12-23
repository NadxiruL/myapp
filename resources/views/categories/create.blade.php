@extends('dashboard.dashboard')


@section('content')

@if(session('success') )

<h6 class="alert alert-success"> {{ session('success') }} </h6>

@endif

<h2>Create product category</h2>
<form action="{{ route('category.store') }}"method="POST">
    @csrf
    <div class="form-group col-lg-3">
      <label class="mt-3" for="exampleInputEmail1">Category</label>
      <input type="text" name="name"class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary mt-3">ADD</button>
  </form>
  <a href="{{route('products.index')}}"><button class="btn btn-primary mt-3 float-right">BACK</button></a>



@endsection

