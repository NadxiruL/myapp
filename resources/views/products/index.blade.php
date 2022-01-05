@extends('dashboard.dashboard')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row">

        @foreach ($products as $item)
        <div class="col-3">
            <div class="card mt-5" >
                <img class="card-img-top" src="/storage/{{$item->image}}" alt="Card image cap" height="170px" width="50px">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <h5 class="card-title">CATEGORY : {{ optional($item->category)->name }}</h5>
                    <p class="card-text">{{ $item->descriptions }}</p>
                    <p class="card-text">RM {{ $item->price }}</p>
                    <a href="{{ route('products.edit',$item) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{ $products->links() }}
@endsection
