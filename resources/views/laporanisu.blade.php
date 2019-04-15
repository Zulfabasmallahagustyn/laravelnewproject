@extends('template')
@push('style')
@endpush
@section('content')
<div class="container">
  <form action="{{ route('profile.store') }}" method="post">
  @csrf
    <div class="form-group">
      <label for="user_id">User Id :</label>
        <input type="text" class="form-control" id="user_id" aria-describedby="user_id" placeholder="Enter your user id" name="user_id">
    </div>
    <div class="form-group">
      <label for="name">Name :</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name" name="name">
    </div>
    <div class="form-group">
      <label for="photo_url">Photo url :</label>
        <input type="text" class="form-control" id="photo_url" aria-describedby="photo_url" placeholder="Enter your photo url" name="photo_url">
    </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection