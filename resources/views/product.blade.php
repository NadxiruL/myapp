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

<div class="col-lg-2">
  <div class="mb-3">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
  </div>
   </div>

    <div class="col-lg-5">
    <div class="mb-3">
      <label for="exampleFormControlTextarea1">Descriptions</label>
      <textarea class="form-control mt-2 " id="exampleFormControlTextarea1" rows="5" name="descriptions"></textarea>
    </div>
  </div>

    <div class="col-lg-2">
    <div class="mb-3">
      <label for="exampleInputEmail1">Price</label>
      <input type="text" name="price" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price">
    </div>
     </div>

     <div class="col-md-2">
      <label class="mb-2" for="exampleInputEmail1">Weight</label>
    <div class="input-group mb-3">
      <input type="text" name="weight" class="form-control col-md-2" aria-label="Amount (to the nearest dollar)">
      <div class="input-group-append">
        <span class="input-group-text">KG</span>
      </div>
    </div>
  </div>

    <div class="col-lg-2">
    <div class="mb-3">
      <label for="exampleInputEmail1">Stock</label>
      <input type="text" name="stock"class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
    </div>
  </div>
  
    <div class="col-md-2">
    <div class="mb-3">
      <label class="mb-2" for="exampleInputEmail1">Category</label>
      <select class="form-control" id="exampleFormControlSelect1">
        @foreach ($categories as $category)
            
      
        <option>{{$category->name}}</option>

        @endforeach
      </select>
    </div>
  </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</div>
</div>
  </form>

    
@endsection