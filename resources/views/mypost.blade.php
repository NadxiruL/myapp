@extends('dashboard.dashboard')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')

@if(session('success') )

<h6 class="alert alert-success"> {{ session('success') }} </h6>

@endif


<table class="table table-success table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Body</th>
          <th scope="col">Action</th>
        
        </tr>
      </thead>
      <tbody>
          @foreach ($post as $p)
        <tr>
          <th scope="row">{{($post->currentPage() - 1) * $post->perPage() + $loop->iteration}}</th>
          <td>{{ $p['title'] }}</td>
          <td>{{ $p['body'] }}</td>
          <td> <a href="{{ route('post-edit' , $p->id) }}"> <button type="button" class="btn-sm btn-secondary">Secondary</button></a>

            <form action="{{ route('post-delete' , $p->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete {{$p['title']}}')">
              @method('delete')
              @csrf
              <button type="submit" class="btn-sm btn-danger">
            </form>
          
          </td>
         
        </tr>
        @endforeach
      </tbody>
    </table>

    
    {{ $post->links() }}



    
@endsection