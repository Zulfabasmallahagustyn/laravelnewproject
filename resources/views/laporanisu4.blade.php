@extends('template')
@push('style')
@endpush
@section('content')
<div class="container">
  <form action="{{ route('issuepriority.store') }}" method="post">
  @csrf
    <div class="form-group">
      <label for="name">Name :</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name" name="name">
    </div>
    <div class="form-group">
      <label for="description">Description :</label>
        <input type="text" class="form-control" id="description" aria-describedby="description" placeholder="Enter your description" name="description">
    </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection