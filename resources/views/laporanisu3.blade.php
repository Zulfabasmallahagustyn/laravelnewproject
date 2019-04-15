@extends('template')
@push('style')
@endpush
@section('content')
<div class="container">
  <form action="{{ route('issue.store') }}" method="post">
  @csrf
    <div class="form-group">
      <label for="issue_category_id">Id :</label>
        <input type="text" class="form-control" id="issue_category_id" aria-describedby="issue_category_id" placeholder="Masukkan id buku" name="issue_category_id">
    </div>
    <div class="form-group">
      <label for="name">Judul :</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Masukkan judul buku" name="name">
    </div>
    <div class="form-group">
      <label for="email">Penerbit :</label>
        <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Masukkan penerbit buku" name="email">
    </div>
    <div class="form-group">
      <label for="issue_priority_id">Tahun Terbit :</label>
        <input type="text" class="form-control" id="issue_priority_id" aria-describedby="issue_priority_id" placeholder="Masukkan tahun terbit buku" name="issue_priority_id">
    </div>
    <div class="form-group">
      <label for="description">Pengarang :</label>
        <input type="text" class="form-control" id="description" aria-describedby="description" placeholder="Masukkan pengarang buku" name="description">
    </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection