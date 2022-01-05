<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-5 col-center mt-3">
<div class="card">
    <div class="card-header">
        <h6>Order Summary</h6>
    <div class="row">
        <div class="col-8 text-left">




@foreach ( $chekcouts as $checkout )



    <p>Product :{{$checkout->product->name}}</p>
    <div class="col-text-left"> Price : RM  </div>

@endforeach
     </div>
    </div>
   </div>
  </div>
</div>
<div class="cotainer">
    <div class="row justify-content-md-center">
        <div class="col-md-5 col-center mt-3">
<form action="" post="POST" class="mt-3">
    @csrf
    <div class="form-group col">
        <input class="form-control " placeholder="Email address" autofocus="" name="email" type="text">
    </div>

</form>
</div>
</div>
</div>
</div>
</div>
