@extends('dashboard.dashboard')
@section('content')
@if($errors->any() )
<h6 class="alert alert-danger"> Please insert you input </h6>
@endif
@if(session('success') )
<h6 class="alert alert-success"> {{ session('success') }} </h6>
@endif
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6 col-center mt-3">
      <form action="{{ route('products.update',$product) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}

        <div class="col-lg-6">
          <div class="mb-3">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name"
            value="{{ $product->name ?? '' }}">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="mb-3">
            <label for="exampleFormControlTextarea1">Descriptions</label>
            <textarea class="form-control mt-2 " id="exampleFormControlTextarea1" rows="5" name="descriptions">{{ $product->descriptions ?? '' }}</textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" name="price" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price"
            value="{{ $product->price }}"
            >
          </div>
        </div>
        <div class="col-md-6">
          <label class="mb-2" for="exampleInputEmail1">Weight</label>
          <div class="input-group mb-3">
            <input type="text" name="weight" class="form-control col-md-2" aria-label="Amount (to the nearest dollar)" value="{{ $product->weight ?? 0 }}">
            <div class="input-group-append">
              <span class="input-group-text">KG</span>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputEmail1">Stock</label>
            <input type="text" name="stock"class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0"  value="{{ $product->stock ?? 0 }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label class="mb-2" for="exampleInputEmail1">Category</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
              @foreach ($categories as $category)
              <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
@endsection
