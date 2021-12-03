@extends('dashboard.dashboard')

@section('content')
@if($errors->any() )

<h6 class="alert alert-danger"> Please insert you input </h6>

@endif

@if(session('success') )

<h6 class="alert alert-success"> {{ session('success') }} </h6>

@endif

<form action="{{ route('products') }}" method="POST">
@csrf

<div class="col-lg-5">
  <div class="mb-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
  </div>
   </div>

    <div class="col-lg-10">
    <div class="mb-3">
      <label for="exampleFormControlTextarea1">Descriptions</label>
      <textarea class="form-control mt-2 " id="exampleFormControlTextarea1" rows="5" name="descriptions"></textarea>
    </div>
  </div>

    <div class="col-lg-5">
    <div class="mb-3">
      <label for="exampleInputEmail1">Price</label>
      <input type="text" name="price" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price">
    </div>
     </div>

    <div class="col-lg-5">
    <div class="mb-3">
      <label for="exampleInputEmail1">Weight</label>
      <input type="text" name="weight" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.00 KG">
    </div>
  </div>

    <div class="col-lg-5">
    <div class="mb-3">
      <label for="exampleInputEmail1">Stock</label>
      <input type="text" name="stock"class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
    </div>
  </div>

    <div class="col-lg-5">
    <div class="mb-3">
      <label for="exampleInputEmail1">Category</label>
      <input type="text" name="category" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
  </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
  </form>

    
@endsection