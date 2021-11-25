@extends('dashboard.dashboard')


<head>
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script type="text/javascript" src="/js/trix.js"></script>
</head>


@section('content')


<form action="{{ route('blog-insert') }}" method="POST">
@csrf
    <div class="col-lg-5">
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Body</label>
      <input id="body" type="hidden" name="body">
      <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
  </form>
    
@endsection