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
      <form method="post" action="{{ route('issuecategory.update', $issuecategory->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="nama">Name:</label>
          <input type="text" class="form-control" name="name" value="{{ $issuecategory->name }}" >
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" class="form-control" name="description" value="{{ $issuecategory->description }}" >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</center>
</div>
@endsection