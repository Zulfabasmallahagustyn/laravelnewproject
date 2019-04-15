@extends('template')
@push('style')
@endpush
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="mx-auto"><center>
  <div class="card uper w-50">
    <div class="card-header">
      Edit
    </div>
    <div class="card-body">
      @if ($errors->any())
    </div>
    <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
    </div></br>
      @endif
      <form method="post" action="{{ route('profile.update', $profile->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="user_id">User Id:</label>
          <input type="text" class="form-control" name="user_id" value="{{ $profile->user_id }}" >
        </div>
        <div class="form-group">
          <label for="nama">Name:</label>
          <input type="text" class="form-control" name="name" value="{{ $profile->name }}" >
        </div>
        <div class="form-group">
          <label for="photo_url">Photo Url:</label>
          <input type="text" class="form-control" name="photo_url" value="{{ $profile->photo_url }}" >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</center>
</div>
@endsection