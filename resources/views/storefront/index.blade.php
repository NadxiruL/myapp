
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
<div class="row">

 @foreach ($product as $item)


<div class="col-3">
  <div class="card mt-5" >
    <img class="card-img-top" src="/storage/{{$item->image}}" alt="Card image cap" height="170px" width="50px">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->descriptions }}</p>
      <p class="card-text">RM : {{ $item->price }}</p>
      <p class="card-text">Stock : {{ $item->stock }}</p>
      <form action="{{route('checkouts')}}" method="post">
        @csrf
        <input type="hidden" value="{{$item->id}}" name="product_id">
        <input type="hidden" value="{{$item->price}}" name="product_price">
        <input type="hidden" value="{{$item->name}}" name="product_name">
        <label for="product_quantity">Quantity</label>
        <input class="col-2 d-inline" type="number" name="product_quantity">
        <div class="mt-2">
      <button class="btn btn-primary">Buy</button>
      <button class="btn btn-primary">Add To Cart</button>
    </div>
      </form>
    </div>
  </div>
</div>

@endforeach
</div>
</div>

{{ $product->links() }}
