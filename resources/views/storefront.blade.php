
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
<div class="row">

 @foreach ($product as $item)


<div class="col-4">
  <div class="card mt-5" >
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->descriptions }}</p>
      <p class="card-text">RM {{ $item->price }}</p>
      <form action="{{route('checkouts')}}" method="post">
        @csrf
        <input type="hidden" value="{{$item->id}}" name="product_id">
        <input type="hidden" value="{{$item->name}}" name="product_name">
        <input type="hidden" value="{{$item->price}}" name="product_price">
      <button class="btn btn-primary">Buy</button>
      <button class="btn btn-primary">Add To Cart</button>
      </form>
    </div>
  </div>
</div>

@endforeach
</div>
</div>

{{ $product->links() }}
