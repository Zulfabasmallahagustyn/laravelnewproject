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
      <form method="post" action="{{ route('issue.update', $issue->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="issue_category_id">Id:</label>
          <input type="text" class="form-control" name="issue_category_id" value="{{ $issue->issue_category_id }}" >
        </div>
        <div class="form-group">
          <label for="nama">Judul:</label>
          <input type="text" class="form-control" name="name" value="{{ $issue->name }}" >
        </div>
        <div class="form-group">
          <label for="email">Penerbit:</label>
          <input type="text" class="form-control" name="email" value="{{ $issue->email }}" >
        </div>
        <div class="form-group">
          <label for="issue_priority_id">Tahun Terbit:</label>
          <input type="text" class="form-control" name="issue_priority_id" value="{{ $issue->issue_priority_id }}" >
        </div>
        <div class="form-group">
          <label for="description">Pengarang:</label>
          <input type="text" class="form-control" name="description" value="{{ $issue->description }}" >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</center>
</div>
@endsection